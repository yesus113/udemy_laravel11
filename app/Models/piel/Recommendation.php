<?php

namespace App\Models\piel;
use App\Models\piel\Recommendation;

use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    protected $fillable = ['rec_recomendacion', 'tipo_piel_id '];

    public function tipo_piel()  {
        return $this->belongsTo(Tipo_piel::class);
}
}
