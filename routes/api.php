<?php
//API -- Controllers
use App\Http\Controllers\Api\ApiCategoryController;
use App\Http\Controllers\Api\ApiPostController;
use App\Http\Controllers\Api\SensorController;
use App\Http\Controllers\Api\SkinController;
use App\Http\Controllers\Api\ESP32Controller;
use App\Http\Controllers\Api\TCS3200Controller;
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


Route::post('sensor-data', [SensorController::class, 'storeData']);//sensores ambientales 

Route::post('tcs3200-data', [TCS3200Controller::class, 'storeTCS3200']); // DATOS TCS3200
// Ruta protegida
Route::middleware('auth:sanctum')->get('esp32-data', [ESP32Controller::class, 'getRecomendacion']);


//SKIN
Route::post('skin-data', [SkinController::class, 'storeSkin']);

//Route::get('esp32-data', [ESP32Controller::class, 'getRecomendacion']);

//Route::get('esp32-data/{equipoId}', [ESP32Controller::class, 'getRecomendacion']);


// Ruta protegida por Sanctum
Route::middleware('auth:sanctum')->get('esp32-data', [ESP32Controller::class, 'getRecomendacion']);

