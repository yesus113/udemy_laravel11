<?php

namespace App\Http\Controllers\piel;

use App\Http\Controllers\Controller;
use App\Models\piel\Tipo_piel;
use Illuminate\Http\Request;

class Tipo_pielController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $piel = Tipo_piel::paginate(6);
        return view('piel.tipo_piel.index', compact('piel'));
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
    public function show(Tipo_piel $tipo_piel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tipo_piel $tipo_piel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tipo_piel $tipo_piel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tipo_piel $tipo_piel)
    {
        //
    }
}
