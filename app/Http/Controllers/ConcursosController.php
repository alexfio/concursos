<?php

namespace Concursos\Http\Controllers;

use Illuminate\Http\Request;
use Concursos\Modules\ConcursosInterface;

class ConcursosController extends Controller
{
    
    private $moduloConcursos;
    
    public function __construct(ConcursosInterface $modulo) {
        
        $this->moduloConcursos = $modulo;
    }
    
    //Carrega a tela de concurso
    public function index() {
        return view('concursos.index');
    }
    
    public function cadastrar() {
        $dados['id'] = 1;
        
        $dados['descricao'] = "Câmara Municipal de Osasco";
        
        $dados['edital'] = "73/2014";
        
        $dados['data_inicio_inscricoes'] = "17/08/2017";
        
        $dados['data_termino_inscricoes'] = "25/08/2017";
        
        $dados['zerar_alguma_prova_elimina_candidato'] = true;
        
        $dados['situacao_concurso_id'] = 1;
        
        $this->moduloConcursos->cadastrarOuAtualizar($dados);
        
    }
}
