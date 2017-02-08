<?php
namespace Concursos\Model\Repositories\Eloquent;

use Concursos\Model\Repositories\EstadosRepositoryInterface;
use Concursos\Model\Estado;



class EstadosRepository implements EstadosRepositoryInterface {
    
    public function findBy(string $coluna, string $valor): array {
      $estado = Estado::where($coluna, $valor)->firstOrFail();  
      return $estado->toArray();
    }

    public function getCidadesByEstadoId(int $id): array {
        $estado = Estado::findOrFail($id);
        $cidades = $estado->cidades->toArray();
        return $cidades;
    }

    public function all() : array {
        $estados  = Estado::all()->toArray();
        sort($estados);
        return $estados;
    }

}
