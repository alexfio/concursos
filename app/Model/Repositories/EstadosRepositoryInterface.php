<?php

namespace Concursos\Model\Repositories;

interface EstadosRepositoryInterface {
    public function getById(int $id) : array; 
    public function getBySigla(string $sigla) : array;
    public function getCidadesByEstadoId(int $id): array;
    
    
}

