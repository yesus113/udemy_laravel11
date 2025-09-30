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

    public function __construct()
    {
        $this->fotoValue = 0;
        $this->loadSensorData();
    }

    protected function loadSensorData()
    {
        try {
            $userConfigurations = [];
            
            if (Auth::check() && !Auth::user()->isSuperAdmin()) {
                $userConfigurations = Auth::user()->configurations()->pluck('id')->toArray();
            }

            $query = Foto_resist::latest('fot_fecha');
            
            if (!empty($userConfigurations)) {
                $query->whereIn('configuration_id', $userConfigurations);
            }
            
            $lastRecord = $query->first();
            
            if ($lastRecord && isset($lastRecord->fot_intens_luz)) {
                $this->fotoValue = (float)$lastRecord->fot_intens_luz;
            }
            
        } catch (\Exception $e) {
            $this->fotoValue = 0;
        }
    }

    public function render(): View
    {
        return view('components.gauge.fot-res', [
            'fotoValue' => $this->fotoValue
        ]);
    }
}