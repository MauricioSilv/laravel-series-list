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
        <li class="list-group-item">{{$serie->nome}}</li>
        @endforeach
    </ul>
@endsection
