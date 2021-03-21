<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class SampleTest extends TestCase
{
    use RefreshDatabase;
 
    public function testHttp()
    {
        $this->assertTrue(true);
        
        $response = $this->get('/');
        $response->assertStatus(200);
                
        $user = factory(User::class)->create();
        
        $response = $this->actingAs($user)->get(route('create'));
        $response->assertStatus(200);
                
        $data = [
            'title'     =>  'AAA',
            'body'      =>  'BBB',
            'user_id'   =>  1,
        ];
        
        $response = $this->post('/posts', $data); 
        $response->assertRedirect('/');
       
        $response = $this->actingAs($user)->get(route('profile_image'));
        $response->assertStatus(200);
        
        $response = $this->post('/uploader', ['image' => 'AAA.jpg']); 
        $response->assertRedirect('/uploader');
        
        $post = factory(Post::class)->create();
        $response = $this->get(route('show', $post));
        $response->assertStatus(200);
        
        $response = $this->actingAs($user)->get(route('edit', $post));
        $response->assertStatus(200);
        
        $response = $this->patch('/posts/' . $post->id, $data); 
        $response->assertRedirect('/');
        
        $response = $this->delete('/posts/' . $post->id); 
        $response->assertRedirect('/');
        
        $comment = factory(Comment::class)->create();
        $response = $this->post('/posts/'. $comment->post_id .'/comments', [
            'body'      =>  'CCC',
            'user_id'   =>  1,
            'post_id'   =>  1,
        ]); 
        $response->assertRedirect(route('show', $comment->post_id));
            
        $response = $this->from(route('show', $post))->delete('/posts/' .$comment->post->id. '/comments/' . $comment->id); 
        $response->assertRedirect(route('show', $post));
        
        $response = $this->get('/no_route');
        $response->assertStatus(404);
    }
}