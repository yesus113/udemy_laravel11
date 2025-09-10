<?php

namespace App\Http\Controllers\sensores;

use App\Http\Controllers\Controller;
use App\Models\sensores\Temp_lm35;
use Illuminate\Http\Request;

class Temp_lm35Controller extends Controller
{
    public function latest()
    {
        $ultimo = Temp_lm35::orderBy('tem_fecha', 'desc')->first();

        return response()->json([
            'x' => strtotime($ultimo->tem_fecha) * 1000,
            'y' => floatval($ultimo->tem_data),
            ]);
    }

    public function lastTwenty()
    {
        $datos = Temp_lm35::orderBy('tem_fecha', 'desc')->take(5)->get()->reverse()->values();

        $formato = $datos->map(function ($item) {
            return [
                'x' => strtotime($item->tem_fecha) * 1000,
                'y' => floatval($item->tem_data),
                
            ];
        });

        return response()->json($formato);
    }

    public function index()
    {
        $lm35 = Temp_lm35::paginate(20);
        return view('sensores.temp_lm35.table', compact('lm35'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Temp_lm35 $temp_lm35)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Temp_lm35 $temp_lm35)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Temp_lm35 $temp_lm35)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Temp_lm35 $temp_lm35)
    {
        //
    }
}
