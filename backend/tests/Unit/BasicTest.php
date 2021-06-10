<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Tests\TestCase;
use App\Models\User;
use App\Models\Post;

class BasicTest extends TestCase
{
    use RefreshDatabase;

    public function testImage()
    {
        $imageName = 'testimage';
        $extension = 'jpg';
        $newImageName = pathinfo($imageName, PATHINFO_FILENAME) . "_" . uniqid() . "." . $extension;
        $filename = basename($newImageName);
        
        $this->assertGreaterThan(14, mb_strlen($filename));
        $this->assertStringStartsWith('testimage_', $filename);
        $this->assertStringEndsWith('.jpg', $filename);
    }

    public function testLoginUserId()
    {
        $user = factory(User::class)->create();
        Auth::login($user);
        $login_user_id = $user !== null && Auth::user() ?  $user->id : null;
 
        $this->assertTrue(Auth::check());        
        $this->assertNotNull($login_user_id);
    }
  
    public function testSearch()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        
        factory(Post::class, 2)->create(
            [
                'title'      => 'first_post',
                'body'       => 'test_body',
                'user_id'    => $user->id,
            ],
            [
                'title'      => 'second_post',
                'body'       => 'test_body',
                'user_id'    => $user->id,
            ],
        );
        
        $keyword = 'first';
        $query_p = Post::query();
        
        $search = $query_p->where('title', 'like', '%'. $keyword . '%')->latest();
        $result = $query_p->where('title', 'first_post')->latest();
        
        $this->assertCount(2, Post::all());
        $this->assertSame($search, $result);

        $keyword = 'post';
        $query_p = Post::query();
        
        $search = $query_p->where('title', 'like', '%'. $keyword . '%')->latest();
        $result1 = $query_p->where('title', 'first_post');
        $result2 = $query_p->where('title', 'second_post');
        $result = $query_p->latest();

        $this->assertCount(2, Post::all());
        $this->assertSame($search, $result);
    }
}