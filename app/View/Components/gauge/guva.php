<?php

namespace App\View\Components\gauge;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

use App\Models\sensores\Uv_guva_s12sd;

class guva extends Component
{
    public $guvaValue;

    public function __construct()
    {
       $this->guvaValue = 0;
        $this->loadSensorData(); 
    }

    protected function loadSensorData()
    {
        try {
            $userConfigurations = [];
            
            if (Auth::check() && !Auth::user()->isSuperAdmin()) {
                $userConfigurations = Auth::user()->configurations()->pluck('id')->toArray();
            }

            $query = Uv_guva_s12sd::latest('uv_fecha');
            
            if (!empty($userConfigurations)) {
                $query->whereIn('configuration_id', $userConfigurations);
            }
            
            $lastRecord = $query->first();
            
            if ($lastRecord && isset($lastRecord->uv_data)) {
                $this->guvaValue = (float)$lastRecord->uv_data;
            }
            
        } catch (\Exception $e) {
            $this->guvaValue = 0;
        }
    }


    public function render()
    {
        return view('components.gauge.guva', [
           'guvaValue'  => $this->guvaValue
        ]);
    }
}
