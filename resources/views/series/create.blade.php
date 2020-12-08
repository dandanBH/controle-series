@extends('layout')

@section('cabecalho')
    Adicionar Série
@endsection

@section('conteudo')

@if(!empty($errors->any()))
<div class="class alert alert-danger">
    'O nome é obrigatório.'
  </div>
@endif


    <form method="post" >
        {{ csrf_field() }}
        <div class="row">
            <div class="col col-8">
                <label for="nome">Nome</label>
                <input type="text" class="text form-control" name="nome" id="nome">
            </div>

            <div class="col col-2">
                <label for="qtd_temporadas">N de temporadas</label>
                <input type="number" class="text form-control" name="qtd_temporadas" id="qtd_temporadas">
            </div>

            <div class="col col-2">
                <label for="ep_por_temporada">Ep por temporada</label>
                <input type="number" class="text form-control" name="ep_por_temporada" id="ep_por_temporada">
            </div>
        </div>
        <button class="btn btn-primary mt-2">Adicionar</button>
    </form>
@endsection
