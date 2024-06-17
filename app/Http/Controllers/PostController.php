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

        auth()->user()->posts()->create($validated);

       return to_route('posts.index');

    }

    public function show(Post $post)
    {
        return view('posts.show', [ 'post' => $post ]);
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [ 'post' => $post ]);
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => ['required', 'max:255', 'min:5', 'unique:posts,title,' . $post->id],
            'content' => ['required', 'max:1000', 'min:5'],
        ]);

        $post->update($validated);
        return to_route('posts.show', ['post' => $post ]);

    }

    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('posts.index');
    }
}
