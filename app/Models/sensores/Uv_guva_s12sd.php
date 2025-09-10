<?php

namespace App\Models\sensores;

use Illuminate\Database\Eloquent\Model;

class Uv_guva_s12sd extends Model
{
    public $timestamps = false;
    protected $fillable = ['uv_data', 'uv_fecha', 'configuration_id'];

    public function configuration()  {
        return $this->belongsTo(Configuration::class);
    }
}
