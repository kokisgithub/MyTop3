<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Admin;

class AdminTest extends TestCase
{
    use RefreshDatabase;
    
    public function testLogin()
    {
        $this->withoutExceptionHandling();
        
        $admin = factory(Admin::class)->create([
            'password'  =>  bcrypt('test1234')
        ]);

        $this->assertGuest($guard = 'admin');
        
        $response = $this->post(route('admin.login'), [
            'email'     =>  $admin->email,
            'password'  =>  'test1234',
        ]); 
        
        $this->assertAuthenticatedAs($admin, $guard = 'admin');
        $response->assertRedirect(route('admin_home'));
    }
   
    public function testLogout()
    {
        $this->withoutExceptionHandling();
        
        $admin = factory(Admin::class)->create();
        $this->actingAs($admin, 'admin');
 
        $this->assertAuthenticatedAs($admin, $guard = 'admin');

        $response = $this->post(route('admin.logout')); 
        
        $this->assertGuest($guard = 'admin');
        $response->assertRedirect(route('admin.login'));
    }
}
