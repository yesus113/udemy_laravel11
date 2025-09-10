<?php

namespace App\Http\Controllers\sensores;

use App\Http\Controllers\Controller;
use App\Models\sensores\Hyt_dht11;
use Illuminate\Http\Request;

class Hyt_dht11Controller extends Controller
{
    public function latest()
    {
        $ultimo = Hyt_dht11::orderBy('hyt_fecha', 'desc')->first();

        return response()->json([
            'x' => strtotime($ultimo->hyt_fecha) * 1000,
            'y' => floatval($ultimo->hyt_temp),
            'y1' => floatval($ultimo->hyt_humd),
            ]);
    }

    public function lastTwenty()
{
    $datos = Hyt_dht11::orderBy('hyt_fecha', 'desc')->take(5)->get()->reverse()->values();

    $formato = $datos->map(function ($item) {
        return [
            'x' => strtotime($item->hyt_fecha) * 1000,
            'y' => floatval($item->hyt_temp),
            'y1' => floatval($item->hyt_humd),
        ];
    });

    return response()->json($formato);
}
    public function index()
    {
        $dht11 = Hyt_dht11::paginate(15);
        return view('sensores.hyt_dht11.table', compact('dht11'));
    }

    public function create()
    {

    }

  
    public function store(Request $request)
    {
        //
    }

    
    public function show(Hyt_dht11 $hyt_dht11)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hyt_dht11 $hyt_dht11)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hyt_dht11 $hyt_dht11)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hyt_dht11 $hyt_dht11)
    {
        //
    }
}
