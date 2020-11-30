<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{

    public function index(Request $request){
        $keyword = $request->input('keyword');
        if ($request->filled('keyword')) {
            $posts = Post::where('title', 'like', '%'. $keyword . '%')->paginate(5);    
        } else {
            $posts = Post::latest()->paginate(5);
        }
        return view('posts.index')->with('posts', $posts)->with('keyword', $keyword);
    }

    public function show(Post $post){
        $post->comments = Comment::where('post_id', $post->id)->orderBy('created_at', 'desc')->get();
        return view('posts.show')->with('post', $post);
    }

    public function create(){
        return view('posts.create');
    }

    public function store(PostRequest $request){
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect('/');
    }

    public function edit(Post $post){
        return view('posts.edit')->with('post', $post);
    }

    public function update(PostRequest $request, Post $post){
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