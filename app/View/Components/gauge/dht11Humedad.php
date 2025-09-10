<?php

namespace App\View\Components\gauge;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

use App\Models\sensores\Hyt_dht11;

class dht11Humedad extends Component
{
     public $humedadValue;
    protected $userConfigurations = [];
    public function __construct()
    {
        if (Auth::check() && !Auth::user()->isSuperAdmin()) {
            $this->userConfigurations = Auth::user()->configurations()->pluck('id')->toArray();
        }
        $this->loadSensorData();
    }

    protected function loadSensorData()
    {
        $this->humedadValue = $this->getLastRecord(
            Hyt_dht11::class,
            'hyt_fecha'
        )?->hyt_humd ?? 0;
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
    
    public function render(): View|Closure|string
    {
        return view('components.gauge.dht11-humedad');
    }
}
