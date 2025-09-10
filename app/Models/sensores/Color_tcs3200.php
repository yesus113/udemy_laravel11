<?php

namespace App\Models\sensores;
use App\Models\piel\Tipo_piel;


use Illuminate\Database\Eloquent\Model;

class Color_tcs3200 extends Model
{

    public $timestamps = false;
    protected $fillable = ['col_R', 'col_G', 'col_B','configuration_id','col_fecha', 'tipo_piel_id'];

    public function configuration()  {
        return $this->belongsTo(Configuration::class);
    }

        public function tipo_piel()  {
            return $this->belongsTo(Tipo_piel::class);
}
        
}
