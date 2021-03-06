<?php
namespace Concursos\Model\Repositories\Eloquent;

use Concursos\Model\Repositories\CidadesRepositoryInterface;
use Concursos\Model\Cidade;



class CidadesRepository implements CidadesRepositoryInterface {
    
    public function findBy(string $coluna, string $valor): array {
      $cidade = Cidade::where($coluna, $valor)->firstOrFail();  
      return $cidade->toArray();
    }

    public function findEstado(int $cidadeId): array {
        $estado = Cidade::find($cidadeId)->estado->toArray();
        return $estado;
    }

}
