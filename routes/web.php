<?php
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\blog\BlogController;

//Sensor models
use App\Models\sensores\Aire_mq135;
use App\Models\sensores\Color_tcs3200;  
use App\Models\sensores\Configuration;
use App\Models\sensores\Foto_resist;
use App\Models\sensores\Hyt_dht11;
use App\Models\sensores\Temp_lm35;
use App\Models\sensores\Uv_guva_s12sd;

//sensor Controllers
use App\Http\Controllers\sensores\Aire_mq135Controller;
use App\Http\Controllers\sensores\Color_tcs3200Controller;
use App\Http\Controllers\sensores\ConfigurationController;
use App\Http\Controllers\sensores\Foto_resistController;
use App\Http\Controllers\sensores\Hyt_dht11Controller;
use App\Http\Controllers\sensores\Temp_lm35Controller;
use App\Http\Controllers\sensores\Uv_guva_s12sdController;

// Piel Controllers
use App\Http\Controllers\piel\RecommendationController;
use App\Http\Controllers\piel\Tipo_pielController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\UserAccessDashboardMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ultimo-registro-sensor', function() {
    $ultimo = Hyt_dht11::latest('hyt_fecha')->first();
    $lastMq135 = Aire_mq135::latest('air_fecha')->first();
    $lastft = Foto_resist::latest('fot_fecha')->first();
    $lastlm35 = Temp_lm35::latest('tem_fecha')->first();
    $lastguva = Uv_guva_s12sd::latest('uv_fecha')->first();

    return response()->json([
        'temperatura' => $ultimo->hyt_temp ?? 0,
        'humedad' => $ultimo->hyt_humd ?? 0,
        //MQ135
        'CO2' => $lastMq135->air_CO2 ?? 0 ,
        'NH3' =>$lastMq135->air_NH3 ?? 0,
        'C2H5OH' =>$lastMq135->air_C2H5OH ?? 0,
        'tolueno' =>$lastMq135->air_tolueno ?? 0,
        'NOx' =>$lastMq135->air_NOx ?? 0,
        'alcohol' =>$lastMq135->air_alcohol ?? 0,
        //FT
        'FT' =>$lastft->fot_intens_luz ?? 0,
        //lm35
        'lm35' =>$lastlm35->tem_data?? 0,
        //guva
        'guva' =>$lastguva->uv_data ?? 0,
    ]);
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
        Route::get('', function(){
            return view ('dashboard');
        })->middleware(['auth'])->name('dashboard');
    });
    
    Route::group(['prefix' => 'blog'], function () {

        Route::get('',[BlogController::class, 'index'])->name('blog.index');
         Route::get('detail/{post}',[BlogController::class, 'show'])->name('blog.show');
           
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
    Route::get('sensor/configuration/list', [ConfigurationController::class, 'list'])->name('config.list');
    Route::get('sensor/configuration/info', [ConfigurationController::class, 'info'])->name('config.info');
});

Route::group(['prefix' => 'piel', 'middleware' => 'auth'], function () {
    Route::resources([
        'recommendation' => RecommendationController::class,
        'tipoPiel' => Tipo_pielController::class,
    ]);
});

require __DIR__.'/auth.php';
