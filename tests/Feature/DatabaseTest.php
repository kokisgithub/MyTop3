<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\Models\User;
use App\Models\Admin;
use App\Models\Post;
use App\Models\Comment;

class DatabaseTest extends TestCase
{
    use RefreshDatabase;

    public function testUser()
    {
        $user = [
            'name'     => 'test_user',
            'email'    => 'test_user@example.com',
            'password' =>  Hash::make('testtest'),
            'image'    => 'test_users_image.jpg',
        ];
        
        factory(User::class)->create($user);
        
        $this->assertCount(1, User::all());
        $this->assertDatabaseHas('users', $user);
        
        $this->assertTrue(
            Schema::hasColumns('users',[
                'id', 'name', 'email', 'email_verified_at', 'password', 'image'
            ])
        );
                
        $readUser = User::where('name', 'test_user')->first();
        $this->assertNotNull($readUser);
        $this->assertTrue(Hash::check('testtest',$readUser->password));
        
        User::where('email', 'test_user@example.com')->delete();
        $this->assertDeleted($readUser);
        $this->assertDatabaseMissing('users', $user);

        $this->assertCount(0, User::all());
    }

    public function testAdmin()
    {
        $admin = [
            'name'     => 'test_admin',
            'email'    => 'test_admin@example.com',
            'password' =>  Hash::make('testtest'),
        ];
        
        factory(Admin::class)->create($admin);
        
        $this->assertCount(1, Admin::all());
        $this->assertDatabaseHas('admins', $admin);
        
        $this->assertTrue(
            Schema::hasColumns('admins',[
                'id', 'name', 'email', 'email_verified_at', 'password',
            ])
        );
                
        $readAdmin = Admin::where('name', 'test_admin')->first();
        $this->assertNotNull($readAdmin);
        $this->assertTrue(Hash::check('testtest',$readAdmin->password));
        
        Admin::where('email', 'test_admin@example.com')->delete();
        $this->assertDeleted($readAdmin);
        $this->assertDatabaseMissing('admins', $admin);

        $this->assertCount(0, Admin::all());
    }

    public function testPost()
    {
        $user = factory(User::class)->create();
        
        $post = [
            'title'      => 'test_title',
            'body'       => 'test_body',
            'user_id'    => $user->id,
        ];
        
        factory(Post::class)->create($post);
        
        $this->assertCount(1, Post::all());
        $this->assertDatabaseHas('posts', $post);
        
        $this->assertTrue(
            Schema::hasColumns('posts',[
                'id', 'title', 'body', 'user_id',
            ])
        );
                
        $readPost = Post::where('body', 'test_body')->first();
        $this->assertNotNull($readPost);
        
        Post::where('title', 'test_title')->delete();
        $this->assertDeleted($readPost);
        $this->assertDatabaseMissing('posts', $post);

        $this->assertCount(0, Post::all());
    }

    public function testComment()
    {
        $user = factory(User::class)->create();
        
        $post = factory(Post::class)->create();
        
        $comment = [
            'body'       => 'test_body',
            'user_id'    => $user->id,
            'post_id'    => $post->id,
        ];
        
        factory(Comment::class)->create($comment);
        
        $this->assertCount(1, Comment::all());
        $this->assertDatabaseHas('comments', $comment);
        
        $this->assertTrue(
            Schema::hasColumns('comments',[
                'id', 'body', 'user_id', 'post_id',
            ])
        );
                
        $readComment = Comment::where('body', 'test_body')->first();
        $this->assertNotNull($readComment);
        
        $readComment->delete();
        $this->assertDeleted($readComment);
        $this->assertDatabaseMissing('comments', $comment);

        $this->assertCount(0, Comment::all());
    }
}