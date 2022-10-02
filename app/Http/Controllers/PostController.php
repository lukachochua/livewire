<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function posts()
    {
        return view('posts', [
            'posts' => Post::all()
        ]);
    }

    public function index(Post $post)
    {
        return view('post.show', [
            'post' => $post,
        ]);
    }

    public function store(Request $request, Post $post)
    {
        $request->validate([
            'comment' => 'required|min:4'
        ]);
    
        Comment::create([
            'post_id' => $post->id,
            'username' => 'Guest',
            'content' => $request->comment,
        ]);
    
        return back()->with('message', 'Comment was posted!');
    }
}
