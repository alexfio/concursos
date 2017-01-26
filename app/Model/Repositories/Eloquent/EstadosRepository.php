<?php
namespace Concursos\Model\Repositories\Eloquent;

use Concursos\Model\Repositories\EstadosRepositoryInterface;
use Concursos\Model\Estado;



class EstadosRepository implements EstadosRepositoryInterface {
    
    public function getById(int $id): array {
      $estado = Estado::findOrFail($id);  
      return $estado->toArray();
    }

    public function getBySigla(string $sigla): array {
      $estado = Estado::where('sigla', $sigla)->firstOrFail();  
      return $estado->toArray();
    }

    public function getCidadesByEstadoId(int $id): array {
        $estado = Estado::findOrFail($id);
        $cidades = $estado->cidades->toArray();
        return $cidades;
    }

}
