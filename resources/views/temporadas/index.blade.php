@extends('layout')
@section('title')
    Temporadas de {{ $serie->nome }}
@endsection
@section('content')
    <ul class="list-group">
        @foreach($temporadas as $temporada)
        <li class="list-group-item">Temporada {{ $temporada->numero }}</li>
        @endforeach
    </ul>
@endsection
