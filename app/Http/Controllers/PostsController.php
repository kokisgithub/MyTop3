<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{

    public function index(Request $request){
        $user = Auth::user();
        if ($user) {
            $login_user_id = $user->id;
        } else {
            $login_user_id = '';
        }
        $keyword = $request->input('keyword');
        $query_p = Post::query();
        if ($request->filled('keyword')) {
            $query_p->where('title', 'like', '%'. $keyword . '%');    
        }
        $posts = $query_p->latest()->paginate(5);
        return view('posts.index')->with('posts', $posts)->with('keyword', $keyword)->with('login_user_id', $login_user_id);
    }

    public function show(Post $post){
        $user = Auth::user();
        if ($user) {
            $login_user_id = $user->id;
        } else {
            $login_user_id = '';
        }
        $post->comments = Comment::where('post_id', $post->id)->orderBy('created_at', 'desc')->get();
        return view('posts.show')->with('post', $post)->with('login_user_id', $login_user_id);
    }

    public function create(Request $request){
        $bullets = $request->input('bullets');
        if ($bullets == 1) {
        $bullets = '
①
②
③';
        } elseif ($bullets == 2) {
            $bullets = '
1.
2.
3.';
        } elseif ($bullets == 3) {
            $bullets = '
Ⅰ.
Ⅱ.
Ⅲ.';
        } elseif ($bullets == 4) {
            $bullets = '
壱 
弐 
参 ';
        } elseif ($bullets == 5) {
            $bullets = '
・
・
・';
        } 
        return view('posts.create')->with('bullets', $bullets);
    }

    public function store(PostRequest $request){
        $post = new Post();
        $user = Auth::user();
        $post->user_id = $user->id;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect('/');
    }

    public function edit(Post $post){
        return view('posts.edit')->with('post', $post);
    }

    public function update(PostRequest $request, Post $post){
        $user = Auth::user();
        $post->user_id = $user->id;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect('/');
    }

    public function destroy(Post $post){
        $post->delete();
        return redirect('/');
    }

}