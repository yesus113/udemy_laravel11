<?php

namespace App\Models\piel;

use Illuminate\Database\Eloquent\Model;

class Tipo_piel extends Model
{
    protected $fillable = ['tip_tipo', 'tip_colorPiel','tip_sensibilidadUV', 'tip_riesgo','tip_fotCutaneo', 'tip_protSolar'];
    function recommendation()  {
        return $this->hasMany(Recommendation::class);
    }
}
