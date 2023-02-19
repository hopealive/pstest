<?php

namespace App\Http\Controllers;

use TCG\Voyager\Models\Page;

class PagesController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($slug)
    {
        $post = Page::where('slug', '=', $slug)->firstOrFail();
        return view('posts/show', compact('post'));
    }
}
