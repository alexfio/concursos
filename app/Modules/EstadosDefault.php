<?php

namespace Concursos\Modules;


use Concursos\Model\Repositories\EstadosRepositoryInterface;
use Concursos\Modules\EstadosInterface;

class EstadosDefault implements EstadosInterface {

    private $estadosRepository;
   
    public function __construct(EstadosRepositoryInterface $repository) {

        $this->estadosRepository = $repository;
    
    }

    public function obterCidadesByEstado(int $id): array {
       return $this->estadosRepository->getCidadesByEstadoId($id); 
    }

}
