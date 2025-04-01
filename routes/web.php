<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\CategoryController;
//sensores
use App\Http\Controllers\sensores\Aire_mq135Controller;
use App\Http\Controllers\sensores\Color_tcs3200Controller;
use App\Http\Controllers\sensores\ConfigurationController;
use App\Http\Controllers\sensores\Foto_resistController;
use App\Http\Controllers\sensores\Hyt_dht11Controller;
use App\Http\Controllers\sensores\Proximidad_hcsr04Controller;
use App\Http\Controllers\sensores\Temp_lm35Controller;
use App\Http\Controllers\sensores\Uv_guva_s12sdController;
//Piel 
use App\Http\Controllers\piel\RecommendationController;
use App\Http\Controllers\piel\Tipo_pielController;



Route::get('/', function () {
    return view('welcome');
});

//INDEX
Route::get('home', [HomeController::class,'index']);


Route::group (['prefix' => 'dashboard'],function(){
    //POSTS
    Route::resource('post', PostController::class);
    //CATEGORIES
    Route::resource('category', CategoryController::class);
});

// -------------------- SENSORES URLs-----------------------//
// MQ135
Route::resource('mq135', Aire_mq135Controller::class);

// TCS3200
Route::resource('tcs3200', Color_tcs3200Controller::class);

//Configuration -- Strong table
Route::resource('config', ConfigurationController::class);

// FOTOCELDA
Route::resource('fotocelda', Foto_resistController::class);

// DHT11
Route::resource('dht11', Hyt_dht11Controller::class);

// HCSR04
Route::resource('hcsr04', Proximidad_hcsr04Controller::class);

//LM35
Route::resource('lm35', Temp_lm35Controller::class);

//GUVAS12SD
Route::resource('guva', Uv_guva_s12sdController::class);

// -------------------- SKIN URLs -----------------------//
//RECOMMENDATION
Route::resource('recommendation', RecommendationController::class);

// TIPO DE PIEL
Route::resource('TipoPiel', Tipo_pielController::class);