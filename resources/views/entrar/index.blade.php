@extends('layout')

@section('cabecalho')
   Entrar
@endsection

@section('conteudo')


@if(!empty($errors->any()))
<div class="class alert alert-danger">
    @foreach ($errors->all() as $error)
       {{ $error }}
    @endforeach
</div>
@endif


<form method="post" action="/entrar">
    {{ csrf_field() }}
        <div class="form-group">
            <label for="email">E-mail</label>
       <input type="email" name="email" id="email" required class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" required min="1" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3">
            Entrar
        </button>

        <a href="/registrar" class="btn btn-secondary mt-3">
            Registrar-se
        </a>
    </form>
@endsection