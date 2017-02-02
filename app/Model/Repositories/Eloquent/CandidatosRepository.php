<?php

namespace Concursos\Model\Repositories\Eloquent;

use Concursos\Model\Repositories\CandidatosRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Concursos\Model\Candidato;
use Concursos\Model\Estado;
use Concursos\Model\Cidade;
use Concursos\Model\TipoLogradouro;
use Concursos\Exceptions\CandidatoJaCadastradoException;

class CandidatosRepository implements CandidatosRepositoryInterface {

    public function saveOrUpdate(array $dados): int {
        $candidato = null;
        
        if (!array_key_exists('id', $dados)) {
           
            if(Candidato::where('cpf', $dados['cpf'])->first()) {
                throw new CandidatoJaCadastradoException();    
            }
               
            $candidato = new Candidato();
        } else {
            $candidato = Candidato::findOrFail($dados['id']);
        }
        
        
        $idCandidato = DB::transaction(function() use ($candidato, $dados) {
            $candidato->nome = $dados['nome'];
            $candidato->nascimento = $dados['nascimento'];
            $candidato->email = $dados['email'];
            $candidato->senha = $dados['senha'];
            $candidato->telefone_residencial = $dados['telefone_residencial'];
            $candidato->telefone_celular = $dados['telefone_celular'];
            $candidato->cpf = $dados['cpf'];
            $candidato->rg = $dados['rg'];
            $candidato->rg_org_exp = $dados['rg_org_exp'];
            $candidato->rg_data_expedicao = $dados['rg_data_expedicao'];
            
            $rgUf = Estado::findOrFail($dados['rg_uf']);
            $candidato->rgUf()->associate($rgUf);
            
            $cidade = Cidade::findOrFail($dados['cidade']);
            $candidato->cidade()->associate($cidade);
            
            $tipoLogradouro = TipoLogradouro::findOrFail($dados['tipo_logradouro']);
            $candidato->tipoLogradouro()->associate($tipoLogradouro);
            
            $candidato->logradouro = $dados['logradouro'];
            $candidato->numero = $dados['numero'];
            $candidato->cep = $dados['cep'];
            $candidato->bairro = $dados['bairro'];
            
            $candidato->save();
            
            return $candidato->id;
        });
        
        return $idCandidato;
    }

    public function findBy(string $coluna, string $valor) : array {
        $candidato = Candidato::where($coluna, $valor)->firstOrFail();
        return $candidato->toArray();
    }
    
}
