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
        return view('uploader.index', [
            'user'            =>  $user,
        ]);
    }
    
    public function upload(UserRequest $request){
        $user = Auth::user();
        $imageName = $request->file('image')->getClientOriginalName(); 
        $extension = $request->file('image')->getClientOriginalExtension();
        $newImageName = pathinfo($imageName, PATHINFO_FILENAME) . "_" . uniqid() . "." . $extension;
        $path = $request->file('image')->storeAs('public', $newImageName);
        $filename = basename($path);
        $user->image = $filename;
        $user->save();
        
        return redirect('/uploader');
    }
}