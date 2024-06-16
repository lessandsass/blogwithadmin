<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => ['required', 'max:255', 'min:5', 'unique:posts,title,' . $post->id],
            'content' => ['required', 'max:1000', 'min:5'],
        ]);

        $validated['user_id'] = Auth::id();
        Post::create($validated);

       return to_route('posts.index');

    }

    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post)
    {
        //
    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }
}
