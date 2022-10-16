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

    public function edit(Post $post)
    {
        return view('post.edit', [
            'post' => $post,
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'photo' => 'nullable|sometimes|image|max:5000'
        ]);


        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'photo' => $request->photo ? $request->file('photo')->store('photos', 'public') : $post->photo,
        ]);

        return back()->with('message', 'Post Updated');
    }
}
