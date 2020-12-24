<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;

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

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:2',
        ]);

        $series = Serie::create(['nome' => $request->nome]);
        $qtdTemporadas = $request->qtd_temporadas;

        for ($i=1; $i <= $qtdTemporadas; $i++) {
            $temporada = $series->temporadas()->create(['numero' => $i]);

            for ($j=1; $j <= $request->ep_por_temporada; $j++) {
                $temporada->episodios()->create(['numero' => $j]);
            }
        }


        $request->session()->flash(
            'mensagem',
            "Série {$series->nome} criada com sucesso!"
        );

        return redirect()->route('home');
    }

    public function destroy(Request $request)
    {
        Serie::destroy($request->id);

        $request->session()->flash(
            'mensagem',
            "série removida com sucesso."
        );

        return redirect()->route('home');
    }
}
