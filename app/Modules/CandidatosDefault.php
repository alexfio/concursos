<?php

namespace Concursos\Modules;

use Concursos\Modules\CandidatosInterface;
use Concursos\Model\Repositories\CandidatosRepositoryInterface;
use Concursos\Helpers\TransformadorDadosInterface;
use Concursos\Exceptions\CandidatoJaCadastradoException;
use Illuminate\Support\Facades\Mail;
use Concursos\Mail\CandidatoEmailPessoal;

class CandidatosDefault implements CandidatosInterface {

    private $candidatosRepository;
    private $transformador;
   
    public function __construct(
            CandidatosRepositoryInterface $repository, 
            TransformadorDadosInterface $transformador) {

        $this->candidatosRepository = $repository;
        $this->transformador = $transformador;
        
    }

    public function cadastrarOuAtualizar(array $dados) {

        try {

            //Efetuando Transformações de limpeza nos dados de entrada
            $dados['nome'] = $this->transformador
                    ->aplicarComposicao('trim', $dados['nome']);
            
            $dados['nascimento'] = $this->transformador
                    ->aplicarComposicao('trim|converterDataBrasileiraParaDateTime', $dados['nascimento']);
            
            $dados['email'] = $this->transformador->trim($dados['email']);
            
            //Apenas levar o campo senha consideração se for 
            //usuário novo
            
            if(!isset($dados['id']))
                $dados['senha'] = $this->transformador
                    ->aplicarComposicao('trim|hash', $dados['senha1']);
            
            $dados['sexo'] = $this->transformador
                    ->aplicarComposicao('trim', $dados['sexo']);
            
            $dados['telefone_residencial'] = 
                    $this->transformador
                    ->aplicarComposicao('deixarApenasNumeros|trim', $dados['telefone_residencial']);
            
            $dados['telefone_celular'] = 
                    $this->transformador
                    ->aplicarComposicao('deixarApenasNumeros|trim', $dados['telefone_celular']);
            
            $dados['cpf'] = $this->transformador
                    ->aplicarComposicao('deixarApenasNumeros|trim', $dados['cpf']);
            
            $dados['rg'] = $this->transformador
                    ->aplicarComposicao('deixarApenasNumeros|trim', $dados['rg']);
            
            $dados['rg_org_exp'] = $this->transformador
                    ->trim($dados['rg_org_exp']);
            
            $dados['rg_data_expedicao'] = $this->transformador
                    ->aplicarComposicao('trim|converterDataBrasileiraParaDateTime', $dados['rg_data_expedicao']);
            
            $dados['rg_uf'] = $this->transformador->trim($dados['rg_uf']);
            $dados['cidade'] = $this->transformador->trim($dados['cidade']);
            $dados['tipo_logradouro'] = $this->transformador->trim($dados['tipo_logradouro']);
            $dados['logradouro'] = $this->transformador->trim($dados['logradouro']);
            $dados['numero'] = $this->transformador->trim($dados['numero']);
            
            $dados['cep'] = $this->transformador
                    ->aplicarComposicao('deixarApenasNumeros|trim', $dados['cep']);
            
            $dados['bairro'] = $this->transformador->trim($dados['bairro']);

            //Criando ou atualizando um novo candidato 
            $id = $this->candidatosRepository->saveOrUpdate($dados);

            return $id;
            
        } catch (CandidatoJaCadastradoException $ex) {
            throw $ex;
        } catch (\Exception $ex) {
            throw $ex;
        }
    }

    public function consultar(
            array $dados, 
            int $pagina, 
            int $qtdPorPagina): array {
        
        $criterios = [];
        
        foreach ($dados as $criterio => $valor) {
            if (!empty($valor)) {
                $criterios[$criterio] = $valor;
            }
        }

        if (count($criterios) < 1) {
            throw new 
            \InvalidArgumentException('Deve ser passado ao menos um critério de busca.');
        }
        
        $criteriosAposTransformacao = [];
        foreach ($criterios as $criterio => $valor) {
            switch ($criterio) {
                case 'nome':
                    $criteriosAposTransformacao['nome'] = $this->transformador->aplicarComposicao("tudoMinusculo|trocarEspacoPorPorcento", $valor);
                    break;
                case 'cpf' :
                    $criteriosAposTransformacao['cpf'] = $this->transformador->deixarApenasNumeros($valor);
                    break;
                default: 
                    $criteriosAposTransformacao[$criterio] = $valor;
                    break;
            }
        }
        
        return $this->candidatosRepository->findByCriteria($criteriosAposTransformacao, $pagina, $qtdPorPagina);
        
    }
    
    public function recuperarSenha(string $enderecoEmail) {
        $enderecoEmail = $this->transformador->trim($enderecoEmail);
    }

    public function enviarEmail(array $dados) : bool {
       $email = new  CandidatoEmailPessoal(
               $dados['destinatario'], 
               $dados['assunto'], 
               $dados['corpo']);
        
       Mail::to($dados['destinatario'])->send($email);
       return count(Mail::failures()) == 0;
       
    }

}
