@extends('layout')

@section('cabecalho')
    Séries
@endsection


@section('conteudo')

@if(!empty($mensagem))
<div class="class alert alert-success">
  {{$mensagem}} 
  </div>
@endif

<a href="/series/adicionar" class="btn btn-dark mb-2">Adicionar</a>
    <ul class="list-group">
        @foreach($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">{{ $serie->nome }}
                <span class="d-flex">
                    <a href="/series/{{$serie->id}}/temporadas" class="btn btn-info btn-sm mr-1">
                        <i class="fas fa-external-link-alt"></i>
                    </a>
                    <form method="post" action="/series/{{ $serie->id}}" 
                    onsubmit="return confirm('Tem Certeza que deseja remover a serie {{addslashes($serie->nome)}}?')">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                        <button class="btn btn-danger btn-sm">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </form>
                </span>
            </li>

        @endforeach 
    </ul>
@endsection