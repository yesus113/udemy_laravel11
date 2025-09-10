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
    $userConfigurations = [];
    if (Auth::check() && !Auth::user()->isSuperAdmin()) {
        $userConfigurations = Auth::user()->configurations()->pluck('id')->toArray();
    }

    // Función helper para consultar el último registro
    $getLastRecord = function($model, $dateField) use ($userConfigurations) {
        $query = $model::latest($dateField);
        if (!empty($userConfigurations)) {
            $query->whereIn('configuration_id', $userConfigurations);
        }
        return $query->first();
    };

    // Consultas
    $ultimo = $getLastRecord(Hyt_dht11::class, 'hyt_fecha');
    $lastMq135 = $getLastRecord(Aire_mq135::class, 'air_fecha');
    $lastft = $getLastRecord(Foto_resist::class, 'fot_fecha');
    $lastlm35 = $getLastRecord(Temp_lm35::class, 'tem_fecha');
    $lastguva = $getLastRecord(Uv_guva_s12sd::class, 'uv_fecha');

    return response()->json([
        'temperatura' => $ultimo->hyt_temp ?? 0,
        'humedad' => $ultimo->hyt_humd ?? 0,
        // MQ135
        'CO2' => $lastMq135->air_CO2 ?? 0,
        'NH3' => $lastMq135->air_NH3 ?? 0,
        'C2H5OH' => $lastMq135->air_C2H5OH ?? 0,
        'tolueno' => $lastMq135->air_tolueno ?? 0,
        'NOx' => $lastMq135->air_NOx ?? 0,
        'alcohol' => $lastMq135->air_alcohol ?? 0,
        // FT
        'FT' => $lastft->fot_intens_luz ?? 0,
        // lm35
        'lm35' => $lastlm35->tem_data ?? 0,
        // guva
        'guva' => $lastguva->uv_data ?? 0,
    ]);
})->middleware('auth');

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
    Route::get('configuration/list', [ConfigurationController::class, 'list'])->name('config.list');
    Route::get('configuration/info', [ConfigurationController::class, 'info'])->name('config.info');
    Route::get('configuration/equipos', [ConfigurationController::class, 'equipo'])->name('config.equip');
    Route::get('/index-sensors', function () { return view('sensores/index');})->name('sensors');
   

});

Route::group(['prefix' => 'piel', 'middleware' => 'auth'], function () {
    Route::resources([
        'recommendation' => RecommendationController::class,
        'tipoPiel' => Tipo_pielController::class,
    ]);
});

require __DIR__.'/auth.php';

//Graficas
Route::group(['prefix' => 'chart', ], function () {
    Route::get('/', function () { return view('charts/index');})->name('charts');
    Route::get('/Tpiel', function () { return view('charts/tipoPiel');})->name('tipoPiel'); 
    Route::get('/TColor', function () { return view('charts/colorPiel');})->name('colorPiel');
    Route::get('/Cross', function () { return view('charts/cruceSensores');})->name('cross');
    // Index per sensor:)
    Route::get('/mq135/index', function () { return view('sensores/aire_mq135/index');})->name('mq135.TGR');
    Route::get('/dht11/index', function () { return view('sensores/hyt_dht11/index');})->name('dht11.TGR');
    Route::get('/guva/index', function () { return view('sensores/uv_guva_s12sd/index');})->name('guva.TGR');
    Route::get('/lm35/index', function () { return view('sensores/temp_lm35/index');})->name('lm35.TGR');
    Route::get('/foto/index', function () { return view('sensores/foto_resist/index');})->name('foto.TGR');
    
});

Route::get('/debug-data', function() {
    $data = DB::table('color_tcs3200s')
        ->select(DB::raw('MONTH(col_fecha) as month'), DB::raw('COUNT(*) as count'))
        ->whereYear('col_fecha', date('Y'))
        ->groupBy('month')
        ->get();
});
// Grafica de linea tiempo real
//MQ135
 Route::get('/mq135/latest', [Aire_mq135Controller::class, 'latest'])->name('mq135.latest');
 Route::get('/aire-mq135/last20', [Aire_mq135Controller::class, 'lastTwenty']);
 //DHT11
 Route::get('/dht11/latest', [Hyt_dht11Controller::class, 'latest'])->name('dht11.latest');
 Route::get('/dht11/last20', [Hyt_dht11Controller::class, 'lastTwenty']);
 //GUVA
 Route::get('/guva/latest', [Uv_guva_s12sdController::class, 'latest'])->name('guva.latest');
 Route::get('/guva/last20', [Uv_guva_s12sdController::class, 'lastTwenty']);
 //LM35
 Route::get('/lm35/latest', [Temp_lm35Controller::class, 'latest'])->name('lm35.latest');
 Route::get('/lm35/last20', [Temp_lm35Controller::class, 'lastTwenty']);
 //FOTO
 Route::get('/foto/latest', [Foto_resistController::class, 'latest'])->name('lm35.latest');
 Route::get('/foto/last20', [Foto_resistController::class, 'lastTwenty']);


 

