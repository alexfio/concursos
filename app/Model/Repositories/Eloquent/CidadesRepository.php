<?php
namespace Concursos\Model\Repositories\Eloquent;

use Concursos\Model\Repositories\CidadesRepositoryInterface;
use Concursos\Model\Cidade;



class CidadesRepository implements CidadesRepositoryInterface {
    
    public function getById(int $id): array {
      $cidade = Cidade::findOrFail($id);  
      return $cidade->toArray();
    }

    

}
