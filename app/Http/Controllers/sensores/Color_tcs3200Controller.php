<?php

namespace App\Http\Controllers\sensores;

use App\Http\Controllers\Controller;
use App\Models\sensores\Color_tcs3200;
use Illuminate\Http\Request;
use App\Http\Requests\Post\StoreRequest;

class Color_tcs3200Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tcs = Color_tcs3200::paginate(10);
        return view('sensores.color_tcs3200.table', compact('tcs'));
    }

    public function create()
    {
        
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
    public function show(Color_tcs3200 $color_tcs3200)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color_tcs3200 $color_tcs3200)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Color_tcs3200 $color_tcs3200)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color_tcs3200 $color_tcs3200)
    {
        //
    }
}
