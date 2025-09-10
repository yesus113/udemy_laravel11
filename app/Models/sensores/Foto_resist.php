<?php

namespace App\Models\sensores;

use Illuminate\Database\Eloquent\Model;

class Foto_resist extends Model
{
    public $timestamps = false;
    protected $fillable = ['fot_intens_luz', 'fot_fecha', 'configuration_id'];

    public function configuration()  {
        return $this->belongsTo(Configuration::class);
    }
}
