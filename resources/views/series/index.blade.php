@extends('layout')
@section('title')
    Séries
@endsection
@section('content')
@if(!empty($mensagens))
    <div class="alert alert-success mt-4">
        {{ $mensagens }}
    </div>
@endif
    <a href="{{ route('create') }}" class="btn btn-dark mt-3 mb-3">Adicionar</a>

    <ul class="list-group">
        @foreach($series as $serie)
        <li class="list-group-item">
            {{$serie->nome}}
            <form method="post" action="{{ route('excluir', $serie->id) }}"
                onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($serie->nome) }}?')"
                >
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Excluir</button>
            </form>
        </li>
        @endforeach
    </ul>
@endsection
