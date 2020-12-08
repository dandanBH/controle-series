<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    public $timestamps = false;
    protected $table = 'serie';
    protected $fillable = ['nome']; //campos atribuidos em massa

    //as relacoes do laravel sao feitas por metodos
    //relacao serie x temporadas
    public function temporadas(){
        return $this->hasMany(Temporada::class, 'serie_id', 'id');
    }
}
