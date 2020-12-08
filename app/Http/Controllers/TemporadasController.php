<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Serie;

use App\Http\Requests;

class TemporadasController extends Controller
{
    public function index(int $serieId){



        $serie = Serie::find($serieId);
        $temporadas = $serie->temporadas; //busca a serie e retorna todas as temporadas



        return view('temporadas.index',
                        [
                            'temporadas'=> $temporadas,
                            'serie'=>$serie
                        ]
                    );
    }

}
