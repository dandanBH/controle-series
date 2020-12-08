<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    protected $fillable = ['numero'];
    public $timestamps = false;

     public function episodios(){ // uma temporada tem varios episodios
         return $this->hasMany(Episodio::class, 'temporada_id', 'id');
     }
     

     public function serie(){   // uma temporada pertence a uma serie
        return $this->belongsTo(Serie::class, 'temporada_id', 'id');
     }
}
