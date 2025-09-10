<?php

namespace App\View\Components\gauge;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

use App\Models\sensores\Aire_mq135;

class mq135C02 extends Component
{
    public $co2Value;
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

        // MQ135
        $this->co2Value = $this->getLastRecord(
            Aire_mq135::class,
            'air_fecha'
        )?->air_CO2 ?? 0;
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
        return view('components.gauge.mq135-c02');
    }
}
