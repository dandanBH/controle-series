<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Serie;


 
use App\Http\Requests\SeriesFormRequest;

class SeriesController extends Controller
{
    public function listarSeries(Request $request) {

       //$serie = Serie::all();
       $serie = Serie:: query()->orderBy('nome')->get();
       $mensagem = $request->session()->get('mensagem');
       $request->session()->remove('mensagem');
      

       return view('series.index',['series'=> $serie,'mensagem'=>$mensagem]);
    }

    public function create(){
        return view('series.create');
    }

    public function store(SeriesFormRequest $request){
     
      $serie = Serie::create(['nome'=>$request->nome]);
      $qtdTemporadas = $request->qtd_temporadas;
      for ($i = 1; $i<= $qtdTemporadas; $i++){
          $temporada = $serie->temporadas()->create(['numero'=>$i]);
          for($j = 1; $j <= $request->ep_por_temporada; $j++){
               $temporada->episodios()->create(['numero'=> $j]);
          }
      }

      $request->session()
      ->flash(
                'mensagem',"Serie {$serie->nome} criada com sucesso"
            );

       return redirect('/series');
    }

    public function destroy(Request $request){
        Serie:: destroy($request->id);
        $request->session()
      ->flash(
                'mensagem',
                "Serie removida com sucesso"
            );
        
            return redirect('/series');
    }
}
