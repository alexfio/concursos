<?php

namespace Concursos\Modules;

use Concursos\Modules\CandidatosInterface;
use Concursos\Model\Repositories\CandidatosRepositoryInterface;
use Concursos\Helpers\TransformadorDadosInterface;

class CandidatosDefault implements CandidatosInterface {
   
   private $candidatosRepository; 
   private $transformador;
   
   public function __construct(CandidatosRepositoryInterface $repository, 
           TransformadorDadosInterface $transformador) {
      
      $this->candidatosRepository = $repository; 
      $this->transformador = $transformador;
   }
   
   public function  cadastrarOuAtualizar(array $dados) {
       
      try {
        //Efetuando Transformações de limpeza nos dados de entrada
       
       $dados['nome'] = $this->transformador->trim($dados['nome']);
       $dados['nascimento'] = $this->transformador->converterDataBrasileiraParaDateTime($this->transformador->trim($dados['nascimento']));
       $dados['email'] = $this->transformador->trim($dados['email']);
       $dados['telefone_residencial'] = $this->transformador->trim($this->transformador->deixarApenasNumeros($dados['telefone_residencial']));
       $dados['telefone_celular'] = $this->transformador->trim($this->transformador->deixarApenasNumeros($dados['telefone_celular']));
       $dados['cpf'] = $this->transformador->trim($this->transformador->deixarApenasNumeros($dados['cpf']));
       $dados['rg'] = $this->transformador->trim($this->transformador->deixarApenasNumeros($dados['rg']));
       $dados['rg_org_exp'] = $this->transformador->trim($dados['rg_org_exp']);
       $dados['rg_data_expedicao'] = $this->transformador->converterDataBrasileiraParaDateTime($this->transformador->trim($dados['rg_data_expedicao']));
       $dados['rg_uf'] = $this->transformador->trim($dados['rg_uf']);
       $dados['cidade'] = $this->transformador->trim($dados['cidade']);
       $dados['tipo_logradouro'] = $this->transformador->trim($dados['tipo_logradouro']);
       $dados['logradouro'] = $this->transformador->trim($dados['logradouro']);
       $dados['numero'] = $this->transformador->trim($dados['numero']);
       $dados['cep'] = $this->transformador->trim($this->transformador->deixarApenasNumeros($dados['cep']));
       $dados['bairro'] = $this->transformador->trim($dados['bairro']);
       
       //Criando ou atualizando um novo candidato 
      return $this->candidatosRepository->criarOuAtualizar($dados);
      } catch (\Exception $ex) {
          echo $ex->getMessage() . '<br>';
          echo $ex->getFile();
          echo $ex->getLine();
      }
   }
}

