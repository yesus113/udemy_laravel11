<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $post = Post::find(3);
        $category = Category::find(1);

        dd($category->posts[0]->slug);
        // $post = Post::find(1);
        // $post->delete();

        // $post->update(
        //     [
        //         'title' => 'new title',
        //         'description' => 'new description',
        //         'content' => 'content',
        //         'image' => 'jpg',
        //         'posted' => 'yes'
        //     ]
        // );

        // Post::create(
        //     [
        //         'title' => 'test title',
        //         'slug' => 'test title',
        //         'description' => 'test title',
        //         'content' => 'test title',
        //         'image' => 'test title',
        //         'posted' => 'not',
        //         'category_id' => 1,
        //     ]
        // );
         
        return 'index';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
