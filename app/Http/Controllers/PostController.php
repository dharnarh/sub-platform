<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Website;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Website $site)
    {
        return response()->json([
            'status' => 'success',
            'msg' => 'Posts fetched',
            'data' => [
                'posts' => $site->posts()->paginate()
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Website $site)
    {
        $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('posts', 'title')->where('website_id', $site->id),
            ],
            'description' => ['required', 'string'],
        ]);

        $post = Post::create([
            'website_id' => $site->id,
            'title' => $request->title,
            'description' => $request->description
        ]);

        return response()->json([
            'status' => 'success',
            'msg' => 'Post created',
            'data' => [
                'post' => $post
            ]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}