<?php

namespace App\Http\Controllers\sensores;

use App\Http\Controllers\Controller;
use App\Models\sensores\Foto_resist;
use Illuminate\Http\Request;

class Foto_resistController extends Controller
{
    public function latest()
    {
        $ultimo = Foto_resist::orderBy('fot_fecha', 'desc')->first();

        return response()->json([
            'x' => strtotime($ultimo->fot_fecha) * 1000,
            'y' => floatval($ultimo->fot_intens_luz),
            ]);
    }

    public function lastTwenty()
    {
        $datos = Foto_resist::orderBy('fot_fecha', 'desc')->take(5)->get()->reverse()->values();

        $formato = $datos->map(function ($item) {
            return [
                'x' => strtotime($item->fot_fecha) * 1000,
                'y' => floatval($item->fot_data),
                
            ];
        });

        return response()->json($formato);
    }
    public function index()
    {
        $ft = Foto_resist::paginate(20);
        return view('sensores.foto_resist.table', compact('ft'));
    }

    
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
    public function show(Foto_resist $foto_resist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Foto_resist $foto_resist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Foto_resist $foto_resist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Foto_resist $foto_resist)
    {
        //
    }
}
