<?php

namespace Concursos\ViewComposers;
use Concursos\Model\Repositories\EstadosRepositoryInterface;
use Illuminate\View\View;

class CandidatoConsultaViewComposer {
    
    private $estadosRepository;
    
    
    public function __construct(
            EstadosRepositoryInterface $estadosRepository) {
        
        $this->estadosRepository = $estadosRepository;
        
    }
    
    public function compose(View $view) {
        $componentes['estados']  = $this->estadosRepository->all();
        $view->with('componentes', $componentes);
    }
}