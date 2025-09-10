<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//models
use App\Models\sensores\Aire_mq135;
use App\Models\sensores\Foto_resist;
use App\Models\sensores\Hyt_dht11;
use App\Models\sensores\Temp_lm35;
use App\Models\sensores\Uv_guva_s12sd;
use App\Models\sensores\Configuration;

class SensorController extends Controller
{
    public function storeData(Request $request) {
        $data = $request->validate([
            'nombre_equipo' => 'required|string', 
            'dht11' => 'required|array',
            'lm393' => 'required|array',
            'mq135' => 'required|array',
            'lm35'  => 'required|array',
            'guva'  => 'required|array'
        ]);

        $configuracion = Configuration::where('con_equipo', $data['nombre_equipo'])->first();

        if (!$configuracion) {
            return response()->json([
                'error' => 'El equipo no está registrado en la base de datos'
            ], 404);
        }

        $data['dht11']['configuration_id'] = $configuracion->id;
        $data['lm393']['configuration_id'] = $configuracion->id;
        $data['mq135']['configuration_id'] = $configuracion->id;
        $data['guva']['configuration_id'] = $configuracion->id;
        $data['lm35']['configuration_id'] = $configuracion->id;

        Hyt_dht11::create($data['dht11']);
        Foto_resist::create($data['lm393']);
        Aire_mq135::create($data['mq135']);
        Uv_guva_s12sd::create($data['guva']);
        Temp_lm35::create($data['lm35']);
        
        return response()->json([
            'status' => 'Datos guardados para el equipo: ' . $data['nombre_equipo'],
            'configuration_id' => $configuracion->id
        ], 201);
    }
}