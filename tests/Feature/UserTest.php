<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
        
        $this->assertGuest();
 
        $response = $this->post(route('login'), [
            'email'     =>  $user->email,
            'password'  =>  'test1234',
        ]); 
        
        $this->assertAuthenticatedAs($user);
        $response->assertRedirect('/');
    }
    
    public function testLogout()
    {
        $this->withoutExceptionHandling();
        
        $user = factory(User::class)->create();
        $this->actingAs($user);
    
        $this->assertAuthenticatedAs($user);

        $response = $this->post(route('logout'));  
        
        $this->assertGuest();
        $response->assertRedirect('/');
    }
}