<?php

namespace App\Models\sensores;

use Illuminate\Database\Eloquent\Model;

class Aire_mq135 extends Model
{
    protected $fillable = ['air_CO2', 'air_NH3', 'air_C2H5OH', 'air_tolueno', 'air_NOx', 'air_alcohol', 'air_fecha','configuration_id'];

    public function configuration()  {
        return $this->belongsTo(Configuration::class);
    }
 
}
