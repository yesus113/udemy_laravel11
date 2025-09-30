<?php

namespace App\View\Components\Charts;

use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PielChartNuevo extends Component
{
    public $chartData = [];
    public $chartYear = null;
    public $hasRealData = false;
    
    public $tiposPiel = [
        1 => 'TIPO I - Muy clara',
        2 => 'TIPO II - Clara', 
        3 => 'TIPO III - Media',
        4 => 'TIPO IV - Oscura',
        5 => 'TIPO V - Muy oscura',
        6 => 'TIPO VI - Extremadamente oscura'
    ];

    public function __construct()
    {
        $this->prepareChartData();
    }

    protected function prepareChartData()
    {
        try {
            // 1. OBTENER CONFIGURACIONES DEL USUARIO
            $userConfigs = $this->getUserConfigurations();
            
            // 2. DETECTAR EL AÑO MÁS RECIENTE CON DATOS
            $this->chartYear = $this->getLatestDataYear($userConfigs);
            
            // 3. EJECUTAR CONSULTA PRINCIPAL
            $queryData = $this->executeMainQuery($userConfigs, $this->chartYear);
            
            // 4. VERIFICAR SI HAY DATOS REALES
            if ($queryData->count() > 0) {
                $this->hasRealData = true;
                $this->processRealData($queryData);
            } else {
                $this->createSampleData();
            }
            
            // 5. LOG PARA DEBUG
            Log::info('TipoPielChart - Preparación completada', [
                'user_id' => Auth::id(),
                'year' => $this->chartYear,
                'has_real_data' => $this->hasRealData,
                'chart_data_count' => count($this->chartData)
            ]);
            
        } catch (\Exception $e) {
            Log::error('Error en TipoPielChart: ' . $e->getMessage());
            $this->createSampleData();
            $this->chartYear = date('Y');
        }
    }

    protected function getUserConfigurations()
    {
        if (Auth::check() && !Auth::user()->isSuperAdmin()) {
            return Auth::user()->configurations()->pluck('id')->toArray();
        }
        return [];
    }

    protected function getLatestDataYear($userConfigs)
    {
        try {
            $query = DB::table('color_tcs3200s');
            
            if (!empty($userConfigs)) {
                $query->whereIn('configuration_id', $userConfigs);
            }
            
            $latestDate = $query->max('col_fecha');
            
            return $latestDate ? date('Y', strtotime($latestDate)) : date('Y');
        } catch (\Exception $e) {
            return date('Y');
        }
    }

    protected function executeMainQuery($userConfigs, $year)
    {
        try {
            $query = DB::table('color_tcs3200s')
                ->select(
                    DB::raw('MONTH(col_fecha) as mes'),
                    'tipo_piel_id',
                    DB::raw('COUNT(*) as total')
                )
                ->whereYear('col_fecha', $year);
            
            if (!empty($userConfigs)) {
                $query->whereIn('configuration_id', $userConfigs);
            }
            
            return $query->groupBy('mes', 'tipo_piel_id')
                ->orderBy('mes')
                ->get();
                
        } catch (\Exception $e) {
            Log::error('Error en consulta TipoPielChart: ' . $e->getMessage());
            return collect(); // Retorna colección vacía
        }
    }

    protected function processRealData($queryData)
    {
        // Inicializar estructura de datos para todos los tipos de piel
        $datosPorTipo = [];
        foreach (array_keys($this->tiposPiel) as $tipoId) {
            $datosPorTipo[$tipoId] = array_fill(0, 12, 0); // 12 meses (0-11)
        }
        
        // Llenar con datos reales de la consulta
        foreach ($queryData as $registro) {
            $mes = ((int) $registro->mes) - 1; // Convertir a índice 0-11
            $tipoPielId = (int) $registro->tipo_piel_id;
            $total = (int) $registro->total;
            
            if ($mes >= 0 && $mes <= 11 && isset($datosPorTipo[$tipoPielId])) {
                $datosPorTipo[$tipoPielId][$mes] = $total;
            }
        }
        
        // Formatear para Highcharts
        foreach ($this->tiposPiel as $tipoId => $nombre) {
            $this->chartData[] = [
                'name' => $nombre,
                'data' => $datosPorTipo[$tipoId] ?? array_fill(0, 12, 0)
            ];
        }
    }

    protected function createSampleData()
    {
        // Datos de ejemplo consistentes
        $this->chartData = [];
        
        foreach ($this->tiposPiel as $tipoId => $nombre) {
            $datosEjemplo = [];
            for ($mes = 0; $mes < 12; $mes++) {
                $datosEjemplo[] = rand(5, 25); // Valores aleatorios entre 5-25
            }
            
            $this->chartData[] = [
                'name' => $nombre . ' (Ejemplo)',
                'data' => $datosEjemplo
            ];
        }
        
        $this->hasRealData = false;
    }

    public function render()
    {
        // ✅ ASEGURAR que chartData siempre sea array
        $chartData = is_array($this->chartData) ? $this->chartData : [];
        
        return view('components.charts.piel-chart-nuevo', [
            'chartData' => $chartData,
            'chartYear' => $this->chartYear,
            'hasRealData' => $this->hasRealData,
            'totalSeries' => count($chartData)
        ]);
    }
}