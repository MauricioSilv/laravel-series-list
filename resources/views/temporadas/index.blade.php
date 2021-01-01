@extends('layout')
@section('title')
    Temporadas de {{ $serie->nome }}
@endsection
@section('content')
    <ul class="list-group">
        @foreach($temporadas as $temporada)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="#">
                Temporada {{ $temporada->numero }}
            </a>
            <span class="badge badge-secondary">
                0 / {{ $temporada->episodios->count() }}
            </span>
        </li>
        @endforeach
    </ul>
@endsection
