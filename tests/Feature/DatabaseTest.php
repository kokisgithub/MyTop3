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

    public function testDatabase()
    {
        $user = [
            'name'     => 'test',
            'email'    => 'test@example.com',
            'password' =>  Hash::make('testtest'),
            'image'    => 'test_image.jpg',
        ];
        
        factory(User::class)->create($user);
        
        $this->assertCount(1, User::all());
        $this->assertDatabaseHas('users', $user);
        
        $this->assertTrue(
            Schema::hasColumns('users',[
                'id', 'name', 'email', 'email_verified_at', 'password', 'image'
            ])
        );
                
        $readUser = User::where('name', 'test')->first();
        $this->assertNotNull($readUser);
        $this->assertTrue(Hash::check('testtest',$readUser->password));
        
        User::where('email', 'test@example.com')->delete();

        $this->assertCount(0, User::all());
    }
}
