<?php

namespace App\Http\Controllers\sensores;

use App\Http\Controllers\Controller;
use App\Models\sensores\Uv_guva_s12sd;
use Illuminate\Http\Request;

class Uv_guva_s12sdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guva = Uv_guva_s12sd::paginate(2);
        return view('sensores.uv_guva_s12sd.index', compact('guva'));
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
