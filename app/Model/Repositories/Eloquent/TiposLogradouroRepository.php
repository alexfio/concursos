<?php
namespace Concursos\Model\Repositories\Eloquent;

use Concursos\Model\Repositories\TiposLogradouroRepositoryInterface;
use Concursos\Model\TipoLogradouro;



class TiposLogradouroRepository implements TiposLogradouroRepositoryInterface {
    
    public function findBy(string $coluna, string $valor): array {
      $tipo = TipoLogradouro::where($coluna, $valor)->firstOrFail();  
      return $tipo->toArray();
    }

   
    public function all() : array {
        $tipos  = TipoLogradouro::all()->toArray();
        sort($tipos);
        return $tipos;
    }

}
