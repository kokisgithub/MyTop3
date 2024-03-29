<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class HttpTest extends TestCase
{
    use RefreshDatabase;

    private static $data = [
                'title'     =>  'AAA',
                'body'      =>  'BBB',
                'user_id'   =>  1,
            ];        
 
    public function testUser() 
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('profile_image'));
        $response->assertStatus(200);
        $response->assertViewIs('profile.upload');
        $response->assertViewHas('user');
        $response->assertSeeText('プロフィール画像アップロード');
        
        $response = $this->post('/profile/upload', ['image' => 'AAA.jpg']); 
        $response->assertRedirect('/profile/upload');    
    }

    public function testPost() 
    {   
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertViewIs('posts.index');
        $response->assertViewHas('posts');
        $response->assertViewHas('keyword');
        $response->assertSeeText('MyTop3');
        $response->assertSeeText('タイトル');
        
        $user = factory(User::class)->create();
        
        $response = $this->actingAs($user)->get(route('create'));
        $response->assertStatus(200);
        $response->assertViewIs('posts.create');
        $response->assertViewHas('selected_symbol');
        $response->assertSeeText('新規投稿');
        
        $response = $this->post('/posts', HttpTest::$data); 
        $response->assertRedirect('/');
        
        $post = factory(Post::class)->create();
        
        $response = $this->get(route('show', $post));
        $response->assertStatus(200);
        $response->assertViewIs('posts.show');
        $response->assertViewHas('post');
        $response->assertSeeText('コメント');
        
        $response = $this->actingAs($user)->get(route('edit', $post));
        $response->assertStatus(200);
        $response->assertViewIs('posts.edit');
        $response->assertViewHas('post');
        $response->assertSeeText('編集');
        
        $response = $this->patch('/posts/' . $post->id, HttpTest::$data); 
        $response->assertRedirect('/');
        
        $response = $this->delete('/posts/' . $post->id); 
        $response->assertRedirect('/');
        
        $response = $this->get('/no_route');
        $response->assertStatus(404);
    }
    
    public function testComment() 
    {
        $user = factory(User::class)->create();
        
        $post = factory(Post::class)->create();
        
        $response = $this->actingAs($user)->get(route('create'));
        
        $response = $this->post('/posts', HttpTest::$data); 
        
        $response = $this->get(route('show', $post));
        $response->assertStatus(200);
        $response->assertViewIs('posts.show');
        $response->assertViewHas('post');
        $response->assertSeeText('コメント');
        
        $comment = factory(Comment::class)->create();
        
        $response = $this->post('/posts/'. $comment->post_id .'/comments', [
            'body'      =>  'CCC',
            'user_id'   =>  1,
            'post_id'   =>  1,
        ]); 
        
        $response->assertRedirect(route('show', $comment->post_id));
        
        $response = $this->from(route('show', $post))->delete('/posts/' .$comment->post->id. '/comments/' . $comment->id); 
        $response->assertRedirect(route('show', $post));
    }
}