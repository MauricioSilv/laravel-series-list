<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Temporada;
use App\Episodio;
use App\Serie;
use App\Services\CriadorDeSerie;
use App\Services\ExcluirSerie;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()
        ->orderBy('nome')
        ->get();
        $mensagens = $request->session()->get('mensagem');

        return view('series.index', compact('series', 'mensagens'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request, CriadorDeSerie $criadorDeSerie)
    {
        $request->validate([
            'nome' => 'required|min:2',
        ]);

        $series = $criadorDeSerie->criarSerie(
            $request->nome,
            $request->qtd_temporadas,
            $request->ep_por_temporada,
        );


        $request->session()->flash(
            'mensagem',
            "Série {$series->nome} criada com sucesso!"
        );

        return redirect()->route('home');
    }

    public function edit(int $id, Request $request)
    {
        $novoNome = $request->nome;
        $serie = Serie::find($id);
        $serie->nome = $novoNome;
        $serie->save();
    }

    public function destroy(Request $request, ExcluirSerie $excluirSerie)
    {
         $nomeDaSerie = $excluirSerie->excluirSerie($request->id);

        $request->session()->flash(
            'mensagem',
            "série $nomeDaSerie removida com sucesso."
        );

        return redirect()->route('home');
    }
}
