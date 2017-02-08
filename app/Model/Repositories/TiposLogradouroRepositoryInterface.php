<?php

namespace Concursos\Model\Repositories;

interface TiposLogradouroRepositoryInterface {
    public function findBy(string $coluna, string $valor) : array;
    public function all() : array;
}

