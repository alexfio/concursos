<?php

namespace Concursos\ViewComposers;
use Concursos\Model\Repositories\EstadosRepositoryInterface;
use Illuminate\View\View;
use Concursos\Model\Repositories\SexoRepositoryInterface;

class CandidatoConsultaViewComposer {
    
    private $estadosRepository;
    
    
    public function __construct(
            EstadosRepositoryInterface $estadosRepository,
            SexoRepositoryInterface $sexoRepository) {
        
        $this->estadosRepository = $estadosRepository;
        $this->sexoRepository = $sexoRepository;
        
    }
    
    public function compose(View $view) {
        $componentes['estados']  = $this->estadosRepository->all();
        $componentes['sexo']  = $this->sexoRepository->all();
        $view->with('componentes', $componentes);
    }
}