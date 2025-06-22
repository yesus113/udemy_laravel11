<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Category;

use Illuminate\Http\Request;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\PutRequest;  

class ApiCategoryController extends Controller
{
    
    public function all()
    {
        return response()->json(Category::get());
    }

    public function index()
    {
        return response()->json(Category::paginate(10));
    }

    public function store(StoreRequest $request)
    {
        return response()->json(Category::create($request->validated()));
    }

    
    public function show(Category $category)
    {
        return response()->json($category);
    }

     public function slug(String $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        return response()->json($category);
    }
    
    public function update(PutRequest $request, Category $category)
    {
        $category->update($request->validated());
        return response()->json($category);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json('OK');
    }
}
