<?php

namespace Concursos\ViewComposers;
use Concursos\Model\Repositories\EstadosRepositoryInterface;
use Concursos\Model\Repositories\TiposLogradouroRepositoryInterface;
use Illuminate\View\View;

class CandidatoCadastroViewComposer {
    
    private $estadosRepository;
    private $logradourosRepository;
    
    public function __construct(
            EstadosRepositoryInterface $estadosRepository,
            TiposLogradouroRepositoryInterface $logradourosRepository) {
        
        $this->estadosRepository = $estadosRepository;
        $this->logradourosRepository = $logradourosRepository;
    }
    
    public function compose(View $view) {
        $componentes['estados']  = $this->estadosRepository->all();
        $componentes['logradouros']  = $this->logradourosRepository->all();
        $view->with('componentes', $componentes);
    }
}