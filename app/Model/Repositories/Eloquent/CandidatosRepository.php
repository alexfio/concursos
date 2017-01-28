<?php

namespace Concursos\Model\Repositories\Eloquent;

use Concursos\Model\Repositories\CandidatosRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Concursos\Model\Candidato;
use Concursos\Model\Estado;
use Concursos\Model\Cidade;
use Concursos\Model\TipoLogradouro;
use Concursos\Helpers\TransformadorDadosInterface;

class CandidatosRepository implements CandidatosRepositoryInterface {

    private $transformador;

    public function __construct(TransformadorDadosInterface $transformadorDados) {
        $this->transformador = $transformadorDados;
    }

    public function criarOuAtualizar(array $dados): int {
        $candidato = null;
        if (!array_key_exists('id', $dados)) {
           
            if(Candidato::where('cpf', $dados['cpf'])->get()) {
                throw new \Exception('Candidato já cadastrado');    
            }
               
            $candidato = new Candidato();
        } else {
            $candidato = Candidato::findOrFail($dados['id']);
        }
        
        
        $idCandidato = DB::transaction(function() use ($candidato, $dados) {
            $candidato->nome = $dados['nome'];
            $candidato->nascimento = $dados['nascimento'];
            $candidato->email = $dados['email'];
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

    public function getByCPF(string $cpf): array {
        $candidato = Candidato::where('cpf', $cpf)->firstOrFail();
        return $candidato->toArray();
    }

    public function getByEmail(string $email): array {
        $candidato = Candidato::where('email', $email)->firstOrFail();
        return $candidato->toArray();
    }

    public function getById(int $id): array {
        $candidato = Candidato::findOrFail($id);
        return $candidato->toArray();
    }

}
