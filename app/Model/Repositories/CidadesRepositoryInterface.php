<?php

namespace Concursos\Model\Repositories;

interface CidadesRepositoryInterface {
    public function getById(int $id) : array; 
   
}

