<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use App\Models\Admin;

class AdminTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $this->withoutExceptionHandling();
   
        $admin = factory(Admin::class)->create([
            'password'  =>  bcrypt('test1234')
        ]);
        
        $this->assertFalse(Auth::guard('admin')->check());
 
        $response = $this->post(route('admin.login'), [
            'email'     =>  $admin->email,
            'password'  =>  'test1234',
        ]); 
        
        $this->assertTrue(Auth::guard('admin')->check());
        $response->assertRedirect(route('admin_home'));
    }
}
