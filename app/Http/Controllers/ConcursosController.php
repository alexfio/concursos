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
    
    public function carregarViewCadastrar() {
        return view('concursos.cadastro');
    }
    
    public function cadastrar(Request $request) {
        
        
        var_dump($request->all());
        
        //$this->moduloConcursos->cadastrarOuAtualizar($dados);
        
    }
}
