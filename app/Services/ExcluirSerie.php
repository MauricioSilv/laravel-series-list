<?php

namespace App\Services;
use App\{Serie, Temporada, Episodio};
use Illuminate\Support\Facades\DB;

class ExcluirSerie
{
    public function excluirSerie(int $IdDaSerie): string
    {
        $nomeSerie = '';
        DB::transaction(function () use($IdDaSerie, &$nomeSerie) {
            $serie = Serie::find($IdDaSerie);
                $nomeSerie = $serie->nome;
                    $this->removerTemporadas($serie);
                    $serie->delete();
            });

        return $nomeSerie;
    }

    private function removerTemporadas(Serie $serie) : void {
        $serie->temporadas->each(function (Temporada $temporada){
            $this->removerEpisodios($temporada);
            $temporada->delete();
        });
    }

    private function removerEpisodios(Temporada $temporada): void {
        $temporada->episodios->each(function (Episodio $episodio){
            $episodio->delete();
         });
    }
}
