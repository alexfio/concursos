<?php
namespace Concursos\Model\Repositories\Eloquent;

use Concursos\Model\Repositories\SituacaoConcursoRepositoryInterface;
use Concursos\Model\SituacaoConcurso;



class SituacaoConcursoRepository implements SituacaoConcursoRepositoryInterface {
    
    public function findBy(string $coluna, string $valor): array {
      $situacoes = SituacaoConcurso::where($coluna, $valor)->firstOrFail();  
      return $situacoes->toArray();
    }

   
    public function all() : array {
        $situacoes  = SituacaoConcurso::all()->toArray();
        sort($situacoes);
        return $situacoes;
    }

}
