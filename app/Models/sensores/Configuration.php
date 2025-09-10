<?php

namespace App\Models\sensores;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Configuration extends Model
{
    public $timestamps = false;
    protected $fillable = ['con_tipo_user', 'con_equipo' , 'con_fechaAlta', 'con_latitud', 'con_longitud', 'user_id'];

    public function user(){
    return $this->belongsTo(User::class);
    }
    function Aire_mq135()  {
        return $this->hasMany(Aire_mq135::class);
    }

    function Color_tcs3200()  {
        return $this->hasMany(Color_tcs3200::class);
    }

    function Foto_resist()  {
        return $this->hasMany(Foto_resist::class);
    }

    function Hyt_dht11()  {
        return $this->hasMany(Hyt_dht11::class);
    }

    function Proximidad_hcsr04()  {
        return $this->hasMany(Proximidad_hcsr04::class);
    }

    function Temp_lm35()  {
        return $this->hasMany(Temp_lm35::class);
    }

    function Uv_guva_s12sd()  {
        return $this->hasMany(Uv_guva_s12sd::class);
    }
}
