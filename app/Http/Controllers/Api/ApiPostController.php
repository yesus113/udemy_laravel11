<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;

use Illuminate\Http\Request;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\PutRequest; 

class ApiPostController extends Controller
{
     public function all()
    {
        return response()->json(Post::get());
    }

    public function index()
    {
         return response()->json(Post::paginate(10));
    }

    public function store(StoreRequest $request)
    {
        return response()->json(Post::create($request->validated()));
    }

    public function show(Post $post)
    {
        return response()->json($post);
    }
 public function slug(String $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return response()->json($post);
    }

    public function update(PutRequest $request, Post $post)
    {
        return response()->json($post);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json('OK');
    }
}
