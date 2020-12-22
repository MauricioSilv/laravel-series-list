@extends('layout')
@section('title')
Adicionar Série
@endsection
@section('content')
    <form method="post">
        @csrf
        <div class="form-group mt-3">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome">
        </div>
        <button class="btn btn-primary">Salvar</button>
    </form>
@endsection
