<?php

namespace Concursos\Modules;

use Concursos\Modules\CandidatosInterface;
use Concursos\Model\Repositories\CandidatosRepositoryInterface;
use Concursos\Helpers\TransformadorDadosInterface;
use Concursos\Exceptions\CandidatoJaCadastradoException;
use Concursos\Helpers\GerenciadorEmailInterface;

class CandidatosDefault implements CandidatosInterface {
   
   private $candidatosRepository; 
   private $transformador;
   private $email;
   
   public function __construct(CandidatosRepositoryInterface $repository, 
           TransformadorDadosInterface $transformador, GerenciadorEmailInterface $email) {
      
      $this->candidatosRepository = $repository; 
      $this->transformador = $transformador;
      $this->email = $email;
   }  
   
   public function  cadastrarOuAtualizar(array $dados) {
       
      try {
        
       //Efetuando Transformações de limpeza nos dados de entrada
       $dados['nome'] = $this->transformador->aplicarComposicao('trim', $dados['nome']);
       $dados['nascimento'] = $this->transformador->aplicarComposicao('trim|converterDataBrasileiraParaDateTime', $dados['nascimento']);
       $dados['email'] = $this->transformador->trim($dados['email']);
       $dados['senha'] = $this->transformador->trim($dados['senha']);
       $dados['telefone_residencial'] = $this->transformador->aplicarComposicao('deixarApenasNumeros|trim',$dados['telefone_residencial']);
       $dados['telefone_celular'] = $this->transformador->aplicarComposicao('deixarApenasNumeros|trim',$dados['telefone_celular']);
       $dados['cpf'] = $this->transformador->aplicarComposicao('deixarApenasNumeros|trim',$dados['cpf']);
       $dados['rg'] = $this->transformador->aplicarComposicao('deixarApenasNumeros|trim',$dados['rg']);
       $dados['rg_org_exp'] = $this->transformador->trim($dados['rg_org_exp']);
       $dados['rg_data_expedicao'] = $this->transformador->aplicarComposicao('trim|converterDataBrasileiraParaDateTime',$dados['rg_data_expedicao']);
       $dados['rg_uf'] = $this->transformador->trim($dados['rg_uf']);
       $dados['cidade'] = $this->transformador->trim($dados['cidade']);
       $dados['tipo_logradouro'] = $this->transformador->trim($dados['tipo_logradouro']);
       $dados['logradouro'] = $this->transformador->trim($dados['logradouro']);
       $dados['numero'] = $this->transformador->trim($dados['numero']);
       $dados['cep'] = $this->transformador->aplicarComposicao('deixarApenasNumeros|trim',$dados['cep']);
       $dados['bairro'] = $this->transformador->trim($dados['bairro']);
       
       //Criando ou atualizando um novo candidato 
       return $this->candidatosRepository->saveOrUpdate($dados);
      
      } catch (CandidatoJaCadastradoException $ex) {
         throw $ex;
      }
      catch(\Exception $ex) {
          throw $ex;
      }
   }
   
   public function recuperarSenha(string $enderecoEmail) {
       $enderecoEmail = $this->transformador->trim($enderecoEmail);
       
       
   }
}

