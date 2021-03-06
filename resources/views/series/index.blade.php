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
           
            <span id="nome-serie-{{ $serie->id }}">{{ $serie->nome }}</span>
            <div class="input-group w-50" hidden  id="input-nome-serie-{{ $serie->id }}">
                <input type="text" class="form-control" value="{{ $serie->nome }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" onclick="editarSerie({{ $serie->id }})">
                        <i class="far fa-edit"></i>
                    </button>
                    @csrf
                </div>
            </div>


            <span class="d-flex">
                <button class="btn btn-info btn-sm mr-1" onclick="toggleInput({{ $serie->id }})">
                    <i class="far fa-edit"></i>
                </button>
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

<script>
    function toggleInput(serieId){
        const nomeSerieEl = document.getElementById(`input-nome-serie-${serieId}`);
        const inputSerieEl = document.getElementById(`nome-serie-${serieId}`);
        
        if(nomeSerieEl.hasAttribute('hidden')){
            nomeSerieEl.removeAttribute('hidden');
            inputSerieEl.hidden = true;
        }else{
            inputSerieEl.removeAttribute('hidden');
            nomeSerieEl.hidden = true;
        }
    }

    async function editarSerie(serieId){
        let formData = new FormData();
        const nome = document.querySelector(`#input-nome-serie-${serieId} > input`).value;
        const token = document.querySelector('input[name="_token"]').value;
        const url = `/series/${serieId}/editar`;
        formData.append('nome', nome);
        formData.append('_token', token);
        fetch(url, {
            method: 'POST',
            body: formData,
        }).then(() => {
            toggleInput(serieId);
            document.getElementById(`nome-serie-${serieId}`).textContent = nome;
        });
    }
</script>

@endsection
