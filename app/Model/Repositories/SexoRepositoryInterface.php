<?php

namespace Concursos\Model\Repositories;

interface SexoRepositoryInterface {
    public function findBy(string $coluna, string $valor) : array;
    public function all() : array;
}

