<?php

namespace Concursos\Modules;
use Concursos\Modules\ConcursosInterface;
use Concursos\Model\Repositories\ConcursosRepositoryInterface;
use Concursos\Helpers\TransformadorDadosInterface;

class ConcursosDefault implements ConcursosInterface {
    
    private $concursosRepository;
    private $transformador;
    
    public function __construct(
            ConcursosRepositoryInterface $concursosRepository,
            TransformadorDadosInterface $transformador) {
        
        $this->concursosRepository = $concursosRepository;
        $this->transformador = $transformador;
        
    }
    
    public function cadastrarOuAtualizar(array $dados) {
        
        $dados['nome'] = $this
                ->transformador
                ->aplicarComposicao("trim", $dados['nome']);
        
        $dados['descricao'] = $this
                ->transformador
                ->aplicarComposicao("trim", $dados['descricao']);
        
        $dados['edital'] = $this
                ->transformador
                ->aplicarComposicao("trim", $dados['edital']);
        
        $dados['data_inicio_inscricoes'] = $this
                ->transformador
                ->aplicarComposicao("trim|converterDataBrasileiraParaDateTime"
                        , $dados['data_inicio_inscricoes']);
        
        $dados['data_termino_inscricoes'] = $this
                ->transformador
                ->aplicarComposicao("trim|converterDataBrasileiraParaDateTime"
                        , $dados['data_termino_inscricoes']);
        
        
        $dados['situacao_concurso_id'] = $this
                ->transformador
                ->aplicarComposicao("trim", $dados['situacao_concurso_id']);
        
       
        for($c = 0; $c < count($dados['cargos']); $c++) {
            $dados['cargos'][$c]['nome_cargo'] =
                $this->transformador->trim($dados['cargos'][$c]['nome_cargo']);
        }
        
       
       $this->concursosRepository->saveOrUpdate($dados);
        
        
        
    }

}
