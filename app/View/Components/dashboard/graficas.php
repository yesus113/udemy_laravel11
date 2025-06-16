<?php
namespace App\View\Components\dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
//Models
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
    
    public function __construct()
    {
        //DHT11
        $ultimo = Hyt_dht11::latest('hyt_fecha')->first();
        $this->temperatura = $ultimo->hyt_temp ?? 0;
        $this->humedad = $ultimo->hyt_humd ?? 0;
        //MQ135
        $lastMq135 = Aire_mq135::latest('air_fecha')->first();
        if ($lastMq135) {
            $this->mq135 = $lastMq135->toArray(); //convierte todos los campos en array asociativo
        }
        //Fotoresistencia
        $lastft = Foto_resist::latest('fot_fecha')->first();
        $this->foto_resist = $lastft->fot_intens_luz ?? 0;
        //LM35
        $lastlm35 = Temp_lm35::latest('tem_fecha')->first();
        $this->lm35 = $lastlm35->tem_data ?? 0;
        //GUVA UV
        $lastguva = Uv_guva_s12sd::latest('uv_fecha')->first();
        $this->guva = $lastguva->uv_data ?? 0;
    }

    public function render()
    {
        return view('components.dashboard.graficas');
    }
}