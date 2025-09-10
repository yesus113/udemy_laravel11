<?php
namespace App\View\Components\dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
// Models
use App\Models\sensores\Hyt_dht11;
use App\Models\sensores\Aire_mq135;
use App\Models\sensores\Foto_resist;
use App\Models\sensores\Temp_lm35;
use App\Models\sensores\Uv_guva_s12sd;

class graficas extends Component
{
    public $temperatura;
    public $humedad;
    public $mq135 = [];
    public $foto_resist;
    public $lm35; 
    public $guva;
    protected $userConfigurations = [];

    public function __construct()
    {
        // Obtener configuraciones del usuario (si es admin)
        if (Auth::check() && !Auth::user()->isSuperAdmin()) {
            $this->userConfigurations = Auth::user()->configurations()->pluck('id')->toArray();
        }

        $this->loadSensorData();
    }

    protected function loadSensorData()
    {
        // DHT11 (Temperatura y Humedad)
        $this->loadLastRecord(
            Hyt_dht11::class,
            'hyt_fecha',
            fn($record) => [
                'temperatura' => $record->hyt_temp ?? 0,
                'humedad' => $record->hyt_humd ?? 0
            ]
        );

        // MQ135
        $this->mq135 = $this->getLastRecord(
            Aire_mq135::class,
            'air_fecha'
        )?->toArray() ?? [];

        // Fotoresistencia
        $this->foto_resist = $this->getLastRecord(
            Foto_resist::class,
            'fot_fecha'
        )?->fot_intens_luz ?? 0;

        // LM35
        $this->lm35 = $this->getLastRecord(
            Temp_lm35::class,
            'tem_fecha'
        )?->tem_data ?? 0;

        // GUVA UV
        $this->guva = $this->getLastRecord(
            Uv_guva_s12sd::class,
            'uv_fecha'
        )?->uv_data ?? 0;
    }

    protected function getLastRecord($model, $dateField)
    {
        $query = $model::latest($dateField);

        if (!empty($this->userConfigurations)) {
            $query->whereIn('configuration_id', $this->userConfigurations);
        }

        return $query->first();
    }

    protected function loadLastRecord($model, $dateField, $callback)
    {
        $record = $this->getLastRecord($model, $dateField);
        
        if ($record) {
            $data = $callback($record);
            foreach ($data as $key => $value) {
                $this->$key = $value;
            }
        }
    }

    public function render()
    {
        return view('components.dashboard.graficas');
    }
}