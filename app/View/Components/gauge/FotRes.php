<?php

namespace App\View\Components\gauge;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

use App\Models\sensores\Foto_resist;

class FotRes extends Component
{
    public $fotoValue;
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
        $this->fotoValue = $this->getLastRecord(
            Foto_resist::class,
            'fot_fecha'
        )?->fot_intens_luz ?? 0;
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
        return view('components.gauge.fot-res');
    }
}
