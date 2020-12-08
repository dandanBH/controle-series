<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
     public function episodios(){ // uma temporada tem varios episodios
         return $this->hasMany(Episodio::class, 'idTemporada', 'id');
     }

     public function serie(){   // uma temporada pertence a uma serie
        return $this->belongsTo(Serie::class, 'idTemporada', 'id');
     }
}
