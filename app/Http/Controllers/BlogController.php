<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    public function getIndex() {
        $post = Post::latest()->first();
        return view('blog.index')->with('post', $post);
    }

    public function getSingle($value='{post_slug}') {
        $post = Post::where('post_slug', '=', $value)->first();
        return view('blog.single')->with('post', $post);
    }
}
