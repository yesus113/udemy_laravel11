<?php

namespace App\View\Components\gauge;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

use App\Models\sensores\Aire_mq135;


class mq135Tolueno extends Component
{
    public $toluenoValue;
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
        $this->toluenoValue = $this->getLastRecord(
            Aire_mq135::class,
            'air_fecha'
        )?->air_tolueno ?? 0;
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
        return view('components.gauge.mq135-tolueno');
    }
}
