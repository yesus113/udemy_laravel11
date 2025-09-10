<?php
namespace App\View\Components\Charts;

use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ColorPielChart extends Component
{
    public $chartData;

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

        // Construir la consulta SQL
        $query = "
            SELECT 
                MONTH(col_fecha) as month, 
                COUNT(*) as count
            FROM color_tcs3200s
            WHERE YEAR(col_fecha) = YEAR(CURRENT_DATE)
        ";

        // Añadir filtro por configuración si es necesario
        if (!empty($userConfigurations)) {
            $ids = implode(',', $userConfigurations);
            $query .= " AND configuration_id IN ($ids)";
        }

        $query .= " GROUP BY month ORDER BY month";

        // Ejecutar consulta
        $rawData = DB::select($query);

        // Procesar datos
        $dataMap = [];
        foreach ($rawData as $item) {
            $dataMap[(int)$item->month] = (int)$item->count;
        }

        // Completar meses faltantes
        $this->chartData = [];
        for ($i = 1; $i <= 12; $i++) {
            $this->chartData[] = [
                'name' => $this->getMonthName($i),
                'y' => $dataMap[$i] ?? 0
            ];
        }
    }

    private function getMonthName($monthNumber)
    {
        $months = [
            1 => 'Ene', 2 => 'Feb', 3 => 'Mar', 4 => 'Abr',
            5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Ago',
            9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dic'
        ];
        return $months[$monthNumber] ?? 'N/A';
    }

    public function render()
    {
        return view('components.charts.color-piel-chart', [
            'chartData' => $this->chartData
        ]);
    }
}