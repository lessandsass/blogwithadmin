<?php

namespace App\Http\Controllers;

use App\Mail\PostMail;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

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
            'thumbnail' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails');
        auth()->user()->posts()->create($validated);

        Mail::to(auth()->user()->email)->send(new PostMail(['name' => auth()->user()->name, 'title' => $validated['title']]));

       return to_route('posts.index');

    }

    public function show(Post $post)
    {
        return view('posts.show', [ 'post' => $post ]);
    }

    public function edit(Post $post)
    {
        Gate::authorize('update', $post);
        return view('posts.edit', [ 'post' => $post ]);
    }

    public function update(Request $request, Post $post)
    {
        Gate::authorize('update', $post);
        $validated = $request->validate([
            'title' => ['required', 'max:255', 'min:5', 'unique:posts,title,' . $post->id],
            'content' => ['required', 'max:1000', 'min:5'],
            'thumbnail' => ['sometimes', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],

        ]);

        if ($request->hasFile('thumbnail')) {
            File::delete(storage_path('app/public/' . $post->thumbnail));
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails');
        }

        $post->update($validated);
        return to_route('posts.show', ['post' => $post ]);

    }

    public function destroy(Post $post)
    {
        Gate::authorize('delete', $post);
        File::delete(storage_path('app/public/' . $post->thumbnail));
        $post->delete();
        return to_route('posts.index');
    }
}
