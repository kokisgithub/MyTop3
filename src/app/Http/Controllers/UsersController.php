<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
    public function imageIndex(){
        $user = Auth::user();
        return view('profile.upload', [
            'user'            =>  $user,
        ]);
    }
    
    
    public function upload(UserRequest $request){
        $user = Auth::user();
        $user->image = base64_encode(file_get_contents($request->image));
        $user->save();
        return redirect('/profile/upload');
    }
}