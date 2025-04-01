<?php

namespace App\Http\Controllers\sensores;

use App\Http\Controllers\Controller;
use App\Models\sensores\Hyt_dht11;
use Illuminate\Http\Request;

class Hyt_dht11Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dht11 = Hyt_dht11::paginate(2);
        return view('sensores.hyt_dht11.index', compact('dht11'));
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
