<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
    public function profile(Request $request){
        $user = Auth::user();
        $login_user_id = $user !== null ?  $user->id : null;
        $count = $user->posts->count();
        $query = Post::where('user_id', $user->id);
        $user->posts = $query->latest()->paginate(5);
        return view('profile.profile', [
            'user'              =>      $user,
            'login_user_id'     =>      $login_user_id,
            'count'             =>      $count,
        ]);
    }
    
    public function imageIndex(){
        $user = Auth::user();
        return view('profile.upload', [
            'user'      =>      $user,
        ]);
    }    
    
    public function upload(UserRequest $request){
        $user = Auth::user();
        $user->image = base64_encode(file_get_contents($request->image));
        $user->save();
        return redirect()->back();
    }
}