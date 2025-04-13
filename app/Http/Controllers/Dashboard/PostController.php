<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\PutRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        session()->flush();
        //session(['key' => 'value']);
        $posts = Post::paginate(2);
        return view('dashboard.post.index', compact('posts'));

        // $category = Category::find(1);

        // dd($category->posts[0]->slug);
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
        //     // [
        //     //     'title' => $request->all()['title'],
        //     //     'slug' => $request->all()['slug'],
        //     //     'description' => $request->all()['description'],
        //     //     'content' => $request->all()['content'],
        //     //     // 'image' => $request->all()['image'],
        //     //     'posted' => $request->all()['posted'],
        //     //     'category_id' => $request->all()['category_id'],
        //     // ]
        // );

        return 'index';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('id', 'title');
        $post = new Post();
        return view ('dashboard/post/create', compact('categories','post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        Post::create($request->validated());
        return to_route('post.index')->with('status', 'Post created successfully');
    }


    public function show(Post $post)
    {
        return view('dashboard.post.show', ['post'=> $post]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('id', 'title');
        return view ('dashboard.post.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Post $post)
    {
        $data = $request->validated();

        //image
        if(isset($data['image'])){
            $data['image'] = $filename = time().'.'.$data['image']->extension();

            $request->image->move(public_path('uploads/posts'),$filename);
        }

        //image
        $post->update($data);
        return to_route('post.index')->with('status', 'Post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('post.index')->with('status', 'Post has been deleted');
    }
}
