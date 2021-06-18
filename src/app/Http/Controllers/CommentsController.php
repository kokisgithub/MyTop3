<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;

class CommentsController extends Controller
{
    public function store(CommentRequest $request, Post $post, Comment $comment) {
            $comment = new Comment(['body' => $request->body]);
            $user = Auth::user();
            $comment->user_id = $user->id;    
            $post->comments()->save($comment);
            return redirect()->route('show', $post);
    }

    public function destroy(Post $post, Comment $comment) {
        $comment->delete();
        return redirect()->back();
    }
}