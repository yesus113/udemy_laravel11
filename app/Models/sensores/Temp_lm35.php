<?php

namespace App\Models\sensores;

use Illuminate\Database\Eloquent\Model;

class Temp_lm35 extends Model
{
    public $timestamps = false;
    protected $fillable = ['tem_data', 'tem_fecha', 'configuration_id'];

    public function configuration()  {
        return $this->belongsTo(Configuration::class);
    }
}
