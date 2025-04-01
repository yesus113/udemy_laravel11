<?php

namespace App\Http\Controllers\sensores;

use App\Http\Controllers\Controller;
use App\Models\sensores\Temp_lm35;
use Illuminate\Http\Request;

class Temp_lm35Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lm35 = Temp_lm35::paginate(2);
        return view('sensores.temp_lm35.index', compact('lm35'));
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
