<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => ['required', 'max:255', 'min:5', 'unique:posts,title,' . $post->id],
            'content' => ['required', 'max:1000', 'min:5'],
        ]);

        $post->update($validated);
        return to_route('admin', ['post' => $post ]);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('admin');
    }
}
