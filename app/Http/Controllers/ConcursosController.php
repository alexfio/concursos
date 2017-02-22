<?php

namespace Concursos\Http\Controllers;

use Illuminate\Http\Request;
use Concursos\Modules\ConcursosInterface;
use Concursos\Http\Requests\ConcursoCadastroRequest;

class ConcursosController extends Controller {

    private $moduloConcursos;

    public function __construct(ConcursosInterface $modulo) {

        $this->moduloConcursos = $modulo;
    }

    //Carrega a tela de concurso
    public function index() {
        return view('concursos.index');
    }

    public function carregarViewCadastrar() {
        return view('concursos.cadastro');
    }

    public function cadastrar(ConcursoCadastroRequest $request) {




        //Preparando a entrada vinda da interface para mandar para o módulo
        $entrada = $request->except('_token');
        $dados['nome'] = $entrada['nome'];
        $dados['descricao'] = $entrada['descricao'];
        $dados['edital'] = $entrada['edital'];
        $dados['data_inicio_inscricoes'] = $entrada['data_inicio_inscricoes'];
        $dados['data_termino_inscricoes'] = $entrada['data_termino_inscricoes'];
        $dados['situacao_concurso_id'] = $entrada['situacao_concurso'];
        $dados['zerar_alguma_prova_elimina_candidato'] = $entrada['zerar_alguma_prova_elimina_candidato'];

        

        //Transformação do array de cargos para o formato:
        /*
          0 =>
          array (size=5)
          'nome_cargo' => string 'Analista de Sistemas/Desenvolvedor' (length=34)
          'vagas_ampla' => string '1' (length=1)
          'vagas_pcd' => string '1' (length=1)
          'qtd_aprovados_ampla' => string '1' (length=1)
          'qtd_aprovados_pcd' => string '1' (length=1)
           */
        
        $cargos = [];
        $itens = array_keys($entrada['cargos']);
        for ($cargo = 0; $cargo < count($entrada['cargos']['nome_cargo']); $cargo++) {
            $car = [];
            for ($itemCargo = 0; $itemCargo < count($itens); $itemCargo++) {
                $car[$itens[$itemCargo]] = $entrada['cargos'][$itens[$itemCargo]][$cargo];
            }
            $cargos[] = $car;
        }


        $dados['cargos'] = $cargos;

        $this->moduloConcursos->cadastrarOuAtualizar($dados);
    }

}
