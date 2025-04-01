<?php

namespace App\Http\Controllers\sensores;

use App\Http\Controllers\Controller;
use App\Models\sensores\Foto_resist;
use Illuminate\Http\Request;

class Foto_resistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ft = Foto_resist::paginate(2);
        return view('sensores.foto_resist.index', compact('ft'));
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
