<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\Category\StoreRequest;    
use App\Http\Requests\Category\PutRequest;

class CategoryController extends Controller
{
    public function index()
    {

        $category = Category::paginate(2);
        return view('dashboard.category.index', compact('category'));
    }

    public function create()
    {
        $category = new Category();
        return view('dashboard.category.create', compact('category'));

    }

    public function store(StoreRequest $request)
    {

        Category::create($request->validated());
        return to_route('category.index')->with('status', 'Category created!');


    }


    public function show(category $category)
    {
        return view('dashboard.category.show', ['category'=> $category]);

    }


    public function edit(Category $category)
    {

        return view ('dashboard.category.edit', compact('category'));
    }


    public function update(PutRequest $request, category $category)
    {
        $category->update($request->validated());
        return to_route('category.index')->with('status', 'Category updated!');
    }

    public function destroy(category $category)
    {
        $category->delete();
        return to_route('category.index')->with('status', 'Category deleted!');
    }
}
