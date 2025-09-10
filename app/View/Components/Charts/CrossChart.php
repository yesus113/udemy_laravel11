<?php
namespace App\View\Components\Charts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\sensores\Hyt_dht11;
use App\Models\sensores\Aire_mq135;
use App\Models\sensores\Foto_resist;
use App\Models\sensores\Temp_lm35;
use App\Models\sensores\Uv_guva_s12sd;
use Illuminate\Support\Facades\Auth;

class CrossChart extends Component
{
    public $chartData = [];
    public $days = [];
    protected $startDate;
    protected $endDate;
    protected $userConfigurations = [];

    public function __construct()
    {
        $this->prepareWeeklyAverages();
    }

    protected function prepareWeeklyAverages()
    {
        $maxDate = Hyt_dht11::max('hyt_fecha');
        $this->endDate = Carbon::parse($maxDate)->endOfDay();
        $this->startDate = $this->endDate->copy()->subDays(6)->startOfDay();

        // 2. Obtener configuraciones del usuario (si es admin)
        if (Auth::check() && !Auth::user()->isSuperAdmin()) {
            $this->userConfigurations = Auth::user()->configurations()->pluck('id')->toArray();
        }

        $this->days = [];
        for ($i = 0; $i < 7; $i++) {
            $this->days[] = $this->startDate->copy()->addDays($i)->format('Y-m-d');
        }

        //helper
        $dht11Averages = $this->getSensorData(
            Hyt_dht11::class,
            'hyt_fecha',
            [
                DB::raw("AVG(hyt_temp) as avg_temp"),
                DB::raw("AVG(hyt_humd) as avg_humidity")
            ]
        );

        $mq135Averages = $this->getSensorData(
            Aire_mq135::class,
            'air_fecha',
            [DB::raw("AVG(air_CO2) as avg_co2")]
        );

        $photoAverages = $this->getSensorData(
            Foto_resist::class,
            'fot_fecha',
            [DB::raw("AVG(fot_intens_luz) as avg_light")]
        );

        $lm35Averages = $this->getSensorData(
            Temp_lm35::class,
            'tem_fecha',
            [DB::raw("AVG(tem_data) as avg_temp")]
        );

        $uvAverages = $this->getSensorData(
            Uv_guva_s12sd::class,
            'uv_fecha',
            [DB::raw("AVG(uv_data) as avg_uv")]
        );

        $this->chartData = [
            'labels' => $this->days,
            'datasets' => [
                [
                    'label' => 'Temperatura DHT11 (°C)',
                    'data' => $this->mapAveragesToDays($dht11Averages, 'avg_temp'),
                    'borderColor' => '#e17055',
                    'backgroundColor' => 'rgba(225, 112, 85, 0.2)',
                ],
                [
                    'label' => 'Humedad DHT11 (%)',
                    'data' => $this->mapAveragesToDays($dht11Averages, 'avg_humidity'),
                    'borderColor' => '#0984e3',
                    'backgroundColor' => 'rgba(9, 132, 227, 0.2)',
                ],
                [
                    'label' => 'CO2 MQ135 (ppm)',
                    'data' => $this->mapAveragesToDays($mq135Averages, 'avg_co2'),
                    'borderColor' => '#6c5ce7',
                    'backgroundColor' => 'rgba(108, 92, 231, 0.2)',
                ],
                [
                    'label' => 'Intensidad Lumínica',
                    'data' => $this->mapAveragesToDays($photoAverages, 'avg_light'),
                    'borderColor' => '#fdcb6e',
                    'backgroundColor' => 'rgba(253, 203, 110, 0.2)',
                ],
                [
                    'label' => 'Temperatura LM35 (°C)',
                    'data' => $this->mapAveragesToDays($lm35Averages, 'avg_temp'),
                    'borderColor' => '#e84393',
                    'backgroundColor' => 'rgba(232, 67, 147, 0.2)',
                ],
                [
                    'label' => 'Índice UV',
                    'data' => $this->mapAveragesToDays($uvAverages, 'avg_uv'),
                    'borderColor' => '#00b894',
                    'backgroundColor' => 'rgba(0, 184, 148, 0.2)',
                ]
            ]
        ];
    }

    /**
     * Método helper reutilizable
     */
    protected function getSensorData($modelClass, $dateField, array $avgFields)
    {
        $query = $modelClass::select(
            array_merge(
                [DB::raw("DATE($dateField) as date")],
                $avgFields
            )
        )->whereBetween($dateField, [$this->startDate, $this->endDate]);

        if (!empty($this->userConfigurations)) {
            $query->whereIn('configuration_id', $this->userConfigurations);
        }

        return $query->groupBy(DB::raw("DATE($dateField)"))
            ->orderBy('date')
            ->get()
            ->keyBy('date');
    }

    protected function mapAveragesToDays($averages, $field)
    {
        return array_map(function($day) use ($averages, $field) {
            return isset($averages[$day]) ? round($averages[$day]->$field, 2) : null;
        }, $this->days);
    }

    public function render(): View|Closure|string
    {
        return view('components.charts.cross-chart', [
            'chartConfig' => [
                'type' => 'line',
                'data' => $this->chartData,
                'options' => [
                    'responsive' => true,
                    'scales' => [
                        'y' => [
                            'beginAtZero' => false
                        ]
                    ]
                ]
            ]
        ]);
    }
}