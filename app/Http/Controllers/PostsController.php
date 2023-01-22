<?php

namespace App\Http\Controllers;

use TCG\Voyager\Models\Post;

class PostsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($slug)
    {
        $post = Post::where('slug', '=', $slug)->firstOrFail();
        return view('posts/show', compact('post'));
    }
}
