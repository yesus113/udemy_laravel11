<?php

namespace App\Http\Controllers\sensores;

use App\Http\Controllers\Controller;
use App\Models\sensores\Aire_mq135;
use Illuminate\Http\Request;

class Aire_mq135Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mq135 = Aire_mq135::paginate(1);
        return view('sensores.Aire_mq135.index', compact('mq135'));
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
    public function show(Aire_mq135 $aire_mq135)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aire_mq135 $aire_mq135)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aire_mq135 $aire_mq135)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aire_mq135 $aire_mq135)
    {
        //
    }
}
