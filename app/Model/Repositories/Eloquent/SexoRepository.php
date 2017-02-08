<?php
namespace Concursos\Model\Repositories\Eloquent;

use Concursos\Model\Repositories\SexoRepositoryInterface;
use Concursos\Model\Sexo;



class SexoRepository implements SexoRepositoryInterface {
    
    public function findBy(string $coluna, string $valor): array {
      $sexo = Sexo::where($coluna, $valor)->firstOrFail();  
      return $sexo->toArray();
    }

   
    public function all() : array {
        $sexos  = Sexo::all()->toArray();
        sort($sexos);
        return $sexos;
    }

}
