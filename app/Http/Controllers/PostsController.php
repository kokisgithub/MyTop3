<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Symbol;
use App\Models\User;
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{
    public function index(Request $request, User $user){
        $user = Auth::user();
        $login_user_id = $user !== null ?  $user->id : null;
        
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
        $login_user_id = $user !== null ?  $user->id : null;

        $post->comments = Comment::where('post_id', $post->id)->orderBy('created_at', 'desc')->get();
        return view('posts.show')->with('post', $post)->with('login_user_id', $login_user_id);
    }

    public function create(Request $request, Symbol $symbol){
        $symbols = Symbol::all();
        $selected_symbol = $request->input('selected_symbol');
        return view('posts.create')->with('symbols', $symbols)->with('selected_symbol', $selected_symbol);
    }

    public function store(PostRequest $request){
        $user = Auth::user();
        $post = new Post();
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