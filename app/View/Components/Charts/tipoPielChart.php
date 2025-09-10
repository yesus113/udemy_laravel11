<?php
namespace App\View\Components\Charts;

use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TipoPielChart extends Component
{
    public $chartData;
    public $tiposPiel = [
        1 => 'TIPO 1',
        2 => 'TIPO 2',
        3 => 'TIPO 3',
        4 => 'TIPO 4',
        5 => 'TIPO 5',
        6 => 'TIPO 6'
    ];

    public function __construct()
    {
        $this->prepareChartData();
    }

    protected function prepareChartData()
    {
        // Obtener configuraciones del usuario (si no es SuperAdmin)
        $userConfigurations = [];
        if (Auth::check() && !Auth::user()->isSuperAdmin()) {
            $userConfigurations = Auth::user()->configurations()->pluck('id')->toArray();
        }

        // Consulta para obtener datos agrupados por mes y tipo de piel
        $query = DB::table('color_tcs3200s')
            ->select(
                DB::raw('MONTH(col_fecha) as month'),
                'tipo_piel_id',
                DB::raw('COUNT(*) as count')
            )
            ->whereYear('col_fecha', date('Y'));

        if (!empty($userConfigurations)) {
            $query->whereIn('configuration_id', $userConfigurations);
        }

        $rawData = $query->groupBy('month', 'tipo_piel_id')
            ->orderBy('month')
            ->get();

        // Organizar datos por tipo de piel y mes
        $dataByType = [];
        foreach ($this->tiposPiel as $id => $name) {
            $dataByType[$id] = array_fill(1, 12, 0); // Inicializar todos los meses con 0
        }

        foreach ($rawData as $item) {
            $month = (int)$item->month;
            $tipoId = (int)$item->tipo_piel_id;
            if (isset($dataByType[$tipoId])) {
                $dataByType[$tipoId][$month] = (int)$item->count;
            }
        }

        // Preparar series para Highcharts
        $this->chartData = [];
        foreach ($this->tiposPiel as $id => $name) {
            $this->chartData[] = [
                'name' => $name,
                'data' => array_values($dataByType[$id]) // Elimina el índice 0 del array
            ];
        }
    }

    public function render()
    {
        return view('components.charts.tipo-piel-chart');
    }
}