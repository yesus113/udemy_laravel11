<?php
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\PostController;
//SENSORES
use App\Http\Controllers\sensores\Aire_mq135Controller;
use App\Http\Controllers\sensores\Color_tcs3200Controller;
use App\Http\Controllers\sensores\ConfigurationController;
use App\Http\Controllers\sensores\Foto_resistController;
use App\Http\Controllers\sensores\Hyt_dht11Controller;
use App\Http\Controllers\sensores\Temp_lm35Controller;
use App\Http\Controllers\sensores\Uv_guva_s12sdController;
// PIEL
use App\Http\Controllers\piel\RecommendationController;
use App\Http\Controllers\piel\Tipo_pielController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\UserAccessDashboardMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

    Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', UserAccessDashboardMiddleware::class]], function () {
        Route::resources([
            'post' => PostController::class,
            'category' => CategoryController::class,
        ]);
    });

Route::group(['prefix' => 'sensor', 'middleware' => 'auth'], function () {
    Route::resources([
        'mq135' => Aire_mq135Controller::class,
        'tcs3200' => Color_tcs3200Controller::class,
        'config' => ConfigurationController::class,
        'foto' => Foto_resistController::class,
        'dht11' => Hyt_dht11Controller::class,
        'lm35' => Temp_lm35Controller::class,
        'guva' => Uv_guva_s12sdController::class
    ]);
});

Route::group(['prefix' => 'piel', 'middleware' => 'auth'], function () {
    Route::resources([
        'recommendation' => RecommendationController::class,
        'tipoPiel' => Tipo_pielController::class,
    ]);
});

require __DIR__.'/auth.php';
