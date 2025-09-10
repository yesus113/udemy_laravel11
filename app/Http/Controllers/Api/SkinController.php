<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Models
use App\Models\piel\Recommendation;
use App\Models\piel\Tipo_piel;
use App\Models\sensores\Color_tcs3200;

class SkinController extends Controller
{
    public function storeData(Request $request) {
        $data = $request->validate([
            'tcs3200' => 'required|array',
            'recommendation' => 'required|array',
            'tipo_piel' => 'required|array',
        ]);

        Color_tcs3200::create($data['tcs3200']);
        Recommendation::create($data['recommendation']);
        Tipo_piel::create($data['tipo_piel']);
        
        return response()->json(['status' => 'Datos guardados, Skin'], 201);
    }
}
