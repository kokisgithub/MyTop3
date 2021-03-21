<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function testLogin()
    {
        $this->withoutExceptionHandling();
   
        $user = factory(User::class)->create([
            'password'  =>  bcrypt('test1234')
        ]);
        
        $this->assertFalse(Auth::check());
 
        $response = $this->post(route('login'), [
            'email'     =>  $user->email,
            'password'  =>  'test1234',
        ]); 
        
        $this->assertTrue(Auth::check());
        $response->assertRedirect('/');
    }
    
    public function testLogout()
    {
        $this->withoutExceptionHandling();
        
        $user = factory(User::class)->create();
        $this->actingAs($user);
    
        $this->assertTrue(Auth::check());

        $response = $this->post(route('logout')); 
        
        $this->assertFalse(Auth::check());
        $response->assertRedirect('/');
    }
}