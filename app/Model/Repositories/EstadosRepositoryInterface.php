<?php

namespace Concursos\Model\Repositories;

interface EstadosRepositoryInterface {
    public function findBy(string $coluna, string $valor) : array;
    public function getCidadesByEstadoId(int $id) : array;
}

