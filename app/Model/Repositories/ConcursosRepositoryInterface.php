<?php

namespace Concursos\Model\Repositories;

interface ConcursosRepositoryInterface {
    public function saveOrUpdate(array $dados) : int;
}