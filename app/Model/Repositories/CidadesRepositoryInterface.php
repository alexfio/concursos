<?php

namespace Concursos\Model\Repositories;

interface CidadesRepositoryInterface {
    public function findBy(string $coluna, string $valor) : array; 
    public function findEstado(int $cidadeId) : array; 
   
}

