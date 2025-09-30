<?php

namespace App\Http\Controllers\sensores;

use App\Http\Controllers\Controller;
use App\Models\sensores\Aire_mq135;
use Illuminate\Http\Request;

class Aire_mq135Controller extends Controller
{
   public function latest()
{
    $ultimo = Aire_mq135::orderBy('air_fecha', 'desc')->first();

    return response()->json([
        'x' => strtotime($ultimo->air_fecha) * 1000,
        'y' => floatval($ultimo->air_CO2),
        'y1' => floatval($ultimo->air_NH3),
        'y2' => floatval($ultimo->air_C2H5OH),
        'y3' => floatval($ultimo->air_tolueno),
        'y4' => floatval($ultimo->air_NOx),
    ]);
}

public function lastTwenty()
{
    $datos = Aire_mq135::orderBy('air_fecha', 'desc')->take(5)->get()->reverse()->values();

    $formato = $datos->map(function ($item) {
        return [
            'x' => strtotime($item->air_fecha) * 1000,
            'y' => floatval($item->air_CO2),
            'y1' => floatval($item->air_NH3),
            'y2' => floatval($item->air_C2H5OH),
            'y3' => floatval($item->air_tolueno),
            'y4' => floatval($item->air_NOx)

        ];
    });

    return response()->json($formato);
}


    public function index(Request $request)
    {
        $query = Aire_mq135::with('configuration'); 

    if ($request->filled('fecha')) {
        $query->whereDate('air_fecha', $request->fecha);
    }

    $mq135 = $query->orderBy('air_fecha', 'desc')->paginate(20);

    return view('sensores.aire_mq135.table', compact('mq135'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        
    }

    public function show(Aire_mq135 $aire_mq135)
    {
        //
    }

    public function edit(Aire_mq135 $aire_mq135)
    {

    }

   
    public function update(Request $request, Aire_mq135 $aire_mq135)
    {
        
    }

    
    public function destroy(Aire_mq135 $aire_mq135)
    {
    }
}
