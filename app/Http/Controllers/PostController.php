<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->post_title = $request->input('post_title');

        $str = $post->post_title;

        $sep='-';
        
        $res = strtolower($str);
        $res = preg_replace('/[^[:alnum:]]/', ' ', $res);
        $res = preg_replace('/[[:space:]]+/', $sep, $res);
        $slug = trim($res, $sep);

        $post->post_slug = rtrim($slug, '/');

        // $post->post_title = $request->input('post_slug');
        $post->post_content = $request->input('post_content');
        $post->post_author = $request->input('post_author');
        $post->category_id = $request->input('category_id');
        $post->post_tags = $request->input('post_tags');
        // dd($post);
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.edit')->withPost($post)->withCategories($categories)->withTags($tags);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // return $request->all();
        $post = Post::find($id);
        $post->post_title = $request->input('post_title');

        $str = $post->post_title;

        $sep='-';
        
        $res = strtolower($str);
        $res = preg_replace('/[^[:alnum:]]/', ' ', $res);
        $res = preg_replace('/[[:space:]]+/', $sep, $res);
        $slug = trim($res, $sep);

        $post->post_slug = rtrim($slug, '/');

        // $post->post_title = $request->input('post_slug');
        $post->post_content = $request->input('post_content');
        $post->post_author = $request->input('post_author');
        $post->category_id = $request->input('category_id');
        $post->post_tags = $request->input('post_tags');
        // dd($post);
        $post->save();
        return redirect()->route('posts.show',$post->id)->with('success', 'Post has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
