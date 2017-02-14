<?php

namespace Concursos\ViewComposers;
use Concursos\Model\Repositories\SituacaoConcursoRepositoryInterface;
use Illuminate\View\View;

class ConcursoCadastroViewComposer {
    
    private $situacaoRepository;
    
    public function __construct(
            SituacaoConcursoRepositoryInterface $situacaoRepository) {
        
        $this->situacaoRepository = $situacaoRepository;
        
    }
    
    public function compose(View $view) {
        $componentes['situacoes']  = $this->situacaoRepository->all();
        $view->with('componentes', $componentes);
    }
}