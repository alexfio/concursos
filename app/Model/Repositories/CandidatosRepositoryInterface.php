<?php

namespace Concursos\Model\Repositories;

interface CandidatosRepositoryInterface {
    public function findBy(string $coluna, string $valor) : array;
    public function saveOrUpdate(array $dados) :  int;
}

