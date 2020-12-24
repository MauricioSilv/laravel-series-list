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
        <li class="list-group-item d-flex justify-content-between
        align-items-center">
            {{$serie->nome}}
            <span class="d-flex">

                <a href="{{ route('list_temporadas', $serie->id) }}" class="btn btn-info btn-sm mr-1">
                    <i class="fas fa-external-link-alt"></i>
                </a>

                <form method="post" action="{{ route('excluir', $serie->id) }}"
                onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($serie->nome) }}?')"
                >
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
            </form>
        </span>
        </li>
        @endforeach
    </ul>
@endsection
