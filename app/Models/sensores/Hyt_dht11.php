<?php

namespace App\Models\sensores;

use Illuminate\Database\Eloquent\Model;

class Hyt_dht11 extends Model
{
    protected $fillable = ['hyt_temp', 'hyt_humd','hyt_fecha', 'configuration_id '];

    public function configuration()  {
        return $this->belongsTo(Configuration::class);
    }
}
