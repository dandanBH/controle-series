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
        <div class="class form-group">
            <label for="nome">Nome</label>
            <input type="text" class="text form-control" name="nome" id="nome"> 
        </div>
        <button class="btn btn-primary">Adicionar</button>
    </form>
@endsection