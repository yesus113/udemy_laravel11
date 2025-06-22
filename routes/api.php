<?php
//API
use App\Http\Controllers\Api\ApiCategoryController;
use App\Http\Controllers\Api\ApiPostController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('category/all', [ApiCategoryController::class, 'all']);
Route::get('category/slug/{slug}', [ApiCategoryController::class, 'slug']);

Route::resource('category', ApiCategoryController::class)->except(['create', 'edit']);


Route::get('post/all', [ApiPostController::class, 'all']);
Route::get('post/slug/{slug}', [ApiPostController::class, 'slug']);

Route::resource('post', ApiPostController::class)->except(['create', 'edit']);
