<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\PostController;




Route::get('/', function () {
    return view('welcome');
});


Route::get('test', [PrimerControlador::class,'index']);


Route::resource('post', PostController::class);