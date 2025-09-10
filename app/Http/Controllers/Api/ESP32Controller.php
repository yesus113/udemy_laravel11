<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sensores\Color_tcs3200;
use App\Models\sensores\Uv_guva_s12sd;
use App\Models\piel\Recommendation;

class ESP32Controller extends Controller
{
    /**
     * Mapeo fijo [tipo_piel_id][uv_index] => recommendation_id
     */
    private const RECOMMENDATION_MAP = [
        1 => [ // Tipo I
            1 => 1,
            2 => 2,
            3 => 3,
            4 => 4,
            5 => 5,
            6 => 6,
            7 => 7,
            8 => 8,
            9 => 9,
            10 => 10,
            11 => 11,
        ],
        2 => [ // Tipo II 
            1 => 12,
            2 => 13,
            3 => 14,
            4 => 15,
            5 => 16,
            6 => 17,
            7 => 18,
            8 => 19,
            9 => 20,
            10 => 21,
            11 => 22,
        ],
        3 => [ // Tipo III
            1 => 23,
            2 => 24,
            3 => 25,
            4 => 26,
            5 => 27,
            6 => 28,
            7 => 29,
            8 => 30,
            9 => 31,
            10 => 32,
            11 => 33,
        ],
        4 => [ // Tipo IV
            1 => 34,
            2 => 35,
            3 => 36,
            4 => 37,
            5 => 38,
            6 => 39,
            7 => 40,
            8 => 41,
            9 => 42,
            10 => 43,
            11 => 44,
        ],
        5 => [ // Tipo V
            1 => 45,
            2 => 46,
            3 => 47,
            4 => 48,
            5 => 49,
            6 => 50,
            7 => 51,
            8 => 52,
            9 => 53,
            10 => 54,
            11 => 55,
        ],
        6 => [ // Tipo VI
            1 => 56,
            2 => 57,
            3 => 58,
            4 => 59,
            5 => 60,
            6 => 61,
            7 => 62,
            8 => 63,
            9 => 64,
            10 => 65,
            11 => 66,
        ]
    ];

    /**
     * Endpoint: GET /api/esp32/recomendacion
     * Usa el equipo asignado al usuario autenticado.
     */
    public function getRecomendacion(Request $request)
    {
        try {
            $user = auth()->user();

            // 🔹 Tomamos la primera configuración del usuario
            $configuration = $user->configurations()->firstOrFail();

            // 1. Último registro de color (para tipo de piel)
            $ultimoColor = Color_tcs3200::with('tipo_piel')
                ->where('configuration_id', $configuration->id)
                ->latest('col_fecha')
                ->firstOrFail();

            // 2. Último UV registrado (redondeado a entero)
            $ultimoUV = Uv_guva_s12sd::where('configuration_id', $configuration->id)
                ->latest('uv_fecha')
                ->firstOrFail();

            $uvIndex = round($ultimoUV->uv_data);

            // 3. Obtener ID de recomendación del mapeo
            $recommendationId = $this->getRecommendationId(
                $ultimoColor->tipo_piel_id,
                $uvIndex
            );

            if (!$recommendationId) {
                throw new \Exception("No existe recomendación para UV $uvIndex y piel tipo {$ultimoColor->tipo_piel_id}");
            }

            // 4. Obtener texto de recomendación
            $recomendacion = Recommendation::findOrFail($recommendationId);

            return response()->json([
                'success' => true,
                'data' => [
                    //'tipo_piel_id'     => $ultimoColor->tipo_piel_id,
                    'tipo_piel_nombre' => $ultimoColor->tipo_piel->tip_tipo,
                    'uv_index'         => $uvIndex,
                    'recomendacion'    => $recomendacion->rec_recomendacion,
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error'   => $e->getMessage(),
                'request_data' => [
                    'uv_index'     => $uvIndex ?? null,
                    'tipo_piel_id' => $ultimoColor->tipo_piel_id ?? null
                ]
            ], 404);
        }
    }

    
    private function getRecommendationId($tipoPielId, $uvIndex)
    {
        return self::RECOMMENDATION_MAP[$tipoPielId][$uvIndex] ?? null;
    }
}
