<?php

namespace Concursos\Modules;

use Concursos\Modules\CandidatosInterface;
use Concursos\Model\Repositories\CandidatosRepositoryInterface;

class CandidatosDefault implements CandidatosInterface {
   
   private $candidatosRepository; 
   
   public function __construct(CandidatosRepositoryInterface $repository) {
      $this->candidatosRepository = $repository; 
   }
   
   public function  cadastrarOuAtualizar(array $dados) {
       
   }
}

