<?php

namespace App\Http\Controllers\sensores;

use App\Http\Controllers\Controller;
use App\Models\sensores\Uv_guva_s12sd;
use Illuminate\Http\Request;

class Uv_guva_s12sdController extends Controller
{
    public function latest()
    {
        $ultimo = Uv_guva_s12sd::orderBy('uv_fecha', 'desc')->first();

        return response()->json([
            'x' => strtotime($ultimo->uv_fecha) * 1000,
            'y' => floatval($ultimo->uv_data),
            ]);
    }
    
    public function lastTwenty()
    {
        $datos = Uv_guva_s12sd::orderBy('uv_fecha', 'desc')->take(5)->get()->reverse()->values();

        $formato = $datos->map(function ($item) {
            return [
                'x' => strtotime($item->uv_fecha) * 1000,
                'y' => floatval($item->uv_data),
                
            ];
        });

        return response()->json($formato);
    }
    public function index()
    {
        $guva = Uv_guva_s12sd::paginate(20);
        return view('sensores.uv_guva_s12sd.table', compact('guva'));
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
    public function show(Uv_guva_s12sd $uv_guva_s12sd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Uv_guva_s12sd $uv_guva_s12sd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Uv_guva_s12sd $uv_guva_s12sd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Uv_guva_s12sd $uv_guva_s12sd)
    {
        //
    }
}
