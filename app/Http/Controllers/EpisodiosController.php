<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Episodio;
use App\Temporada;


class EpisodiosController extends Controller
{
    public function index(Temporada $temporada){


        $episodios = $temporada->episodios;
        $temporadaId = $temporada->id;
        return view('episodios.index',['episodios'=> $episodios,'temporadaId'=>$temporadaId]);
    }  
    
    public function assistir(Temporada $temporada, Request $request){
        $episodiosAssistidos = $request->episodios;
        $temporada->episodios->each(function (Episodio $episodio)
       use ($episodiosAssistidos) {
            $episodio->assistido = in_array(
                $episodio->id,
                $episodiosAssistidos
            );
           
        });
        $temporada->push();
        

        return redirect()->back();
    }
}
