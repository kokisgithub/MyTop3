<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
    public function profile(Request $request, User $user){
        $authUser = Auth::user();
        $login_user_id = $authUser !== null ?  $authUser->id : null;
        $count = $user->posts->count();
        $query = Post::where('user_id', $user->id);
        $user->posts = $query->latest()->paginate(5);
        return view('profile.profile', [
            'user'              =>      $user,
            'authUser'          =>      $authUser,
            'login_user_id'     =>      $login_user_id,
            'count'             =>      $count,
        ]);
    }
    
    public function imageIndex(){
        $authUser = Auth::user();
        return view('profile.upload', [
            'authUser'      =>      $authUser,
        ]);
    }    
    
    public function upload(UserRequest $request){
        $authUser = Auth::user();
        $authUser->image = base64_encode(file_get_contents($request->image));
        $authUser->save();
        return redirect()->back();
    }
}