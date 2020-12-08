<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Serie;

use App\Services\CriadorDeSerie;

 
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

    public function store(SeriesFormRequest $request,CriadorDeSerie $criadorDeSerie){
     
     $serie = $criadorDeSerie->criarSerie(

        $request->nome,
        $request->qtd_temporadas,
        $request->ep_por_temporada
     );

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
