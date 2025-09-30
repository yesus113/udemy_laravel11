<?php
namespace App\View\Components\gauge;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

use App\Models\sensores\Hyt_dht11;

class dht11Temperatura extends Component
{
    public $temperaturaValue;

    public function __construct()
    {
       $this->temperaturaValue = 0;
        $this->loadSensorData(); 
    }

    protected function loadSensorData()
    {
        try {
            $userConfigurations = [];
            
            if (Auth::check() && !Auth::user()->isSuperAdmin()) {
                $userConfigurations = Auth::user()->configurations()->pluck('id')->toArray();
            }

            $query = Hyt_dht11::latest('hyt_fecha');
            
            if (!empty($userConfigurations)) {
                $query->whereIn('configuration_id', $userConfigurations);
            }
            
            $lastRecord = $query->first();
            
            if ($lastRecord && isset($lastRecord->hyt_temp)) {
                $this->temperaturaValue = (float)$lastRecord->hyt_temp;
            }
            
        } catch (\Exception $e) {
            $this->temperaturaValue = 0;
        }
    }


    public function render()
    {
        return view('components.gauge.dht11-temperatura', [
           'temperaturaValue'  => $this->temperaturaValue
        ]);
    }
}
