<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sensores\Color_tcs3200;
use App\Models\sensores\Configuration;
use App\Models\piel\Tipo_piel;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;

class TCS3200Controller extends Controller
{  
    // Colores calibrados del ESP32
    private const COLOR_TO_SKIN_TYPE = [
        'Tipo I' => 1,
        'Tipo II Alexi' => 2,
        'Tipo II Manzana' => 2,
        'Tipo II Eddy' => 2,
        'Tipo II promedio' => 2,
        'Tipo III' => 3,
        'Tipo IV Adrian' => 4,
        'Tipo IV nuevo' => 4,
    ];
    
    public function storeTCS3200(Request $request) 
    {
        try {
            $validated = $request->validate([
                'nombre_equipo' => 'required|string|max:50',
                'color_detectado' => 'required|string|max:50',
                'R' => 'required|integer',
                'G' => 'required|integer',
                'B' => 'required|integer'
            ]);

            // Verificar si el color detectado existe en nuestro mapeo
            if (!array_key_exists($validated['color_detectado'], self::COLOR_TO_SKIN_TYPE)) {
                throw ValidationException::withMessages([
                    'color_detectado' => ['El color detectado no está mapeado a un tipo de piel válido'],
                ]);
            }

            $configuracion = Configuration::where('con_equipo', $validated['nombre_equipo'])->firstOrFail();
            $tipoPielId = self::COLOR_TO_SKIN_TYPE[$validated['color_detectado']];

            $data = [
                'configuration_id' => $configuracion->id,
                'col_R' => $validated['R'],
                'col_G' => $validated['G'],
                'col_B' => $validated['B'],
                'tipo_piel_id' => $tipoPielId
            ];

            Color_tcs3200::create($data);

            return response()->json([
                'success' => true,
                'message' => 'Datos de color guardados correctamente',
                'tipo_piel_id' => $tipoPielId
            ], 201);

        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error de validación',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al procesar los datos: ' . $e->getMessage()
            ], 500);
        }
    } 
}