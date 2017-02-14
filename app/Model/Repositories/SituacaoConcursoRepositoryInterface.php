<?php

namespace Concursos\Model\Repositories;

interface SituacaoConcursoRepositoryInterface {
    public function findBy(string $coluna, string $valor) : array;
    public function all() : array;
}

