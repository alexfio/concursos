<?php

namespace Concursos\Http\Controllers;

use Concursos\Modules\CandidatosInterface;
use Concursos\Http\Requests\CandidatoCadastroRequest;
use Concursos\Exceptions\CandidatoJaCadastradoException;

class CandidatosController extends Controller
{
    private $moduloCandidatos;
    public function __construct(CandidatosInterface $moduloCandidatos) {
        $this->moduloCandidatos = $moduloCandidatos;
    }
    
    public function index() {
        return view('candidatos.index');
    }
    
    public function carregarViewCadastrar() {
       return view('candidatos.cadastro');
    }
    
    public function carregarViewConsulta() {
        return view('candidatos.consultar');
    }
    
    public function cadastrar(CandidatoCadastroRequest $request) {
        try{
            $this->moduloCandidatos->cadastrarOuAtualizar($request->all());
            $entrada['cadastro_ok'] = true;
            return redirect()
                    ->action("CandidatosController@index")
                    ->withInput($entrada);
        } 
        catch(CandidatoJaCadastradoException $ex) {
            $entrada = $request->all();
            $entrada['jaCadastrado'] = true;
            return redirect()
                    ->action("CandidatosController@carregarViewCadastrar")
                    ->withInput($entrada);
        }
        catch (\Exception $ex) {
            $entrada = $request->all();
            $entrada['excecaoGenerica'] = true;
            return redirect()
                    ->action("CandidatosController@carregarViewCadastrar")
                    ->withInput($entrada);
        }
            
    }
}
