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
            $candidato = new Candidato();
        } else {
            $candidato = $this->getById($dados['id']);
        }

        $idCandidato = DB::transaction(function() use ($candidato, $dados) {
            $candidato->nome = $this->transformador->trim($this->transformador->trim($dados['nome']));

            $candidato->nascimento = $this->transformador
                    ->converterDataBrasileiraParaDateTime(
                    $this->transformador->trim($dados['nascimento']));

            $candidato->email = $this->transformador->trim($dados['email']);

            $candidato->telefone_residencial = $this->transformador
                    ->trim($this->transformador->deixarApenasNumeros($dados['telefone_residencial']));

            $candidato->telefone_celular = $this->transformador
                    ->trim($this->transformador->deixarApenasNumeros($dados['telefone_celular']));

            $candidato->cpf = $this->transformador
                    ->trim($this->transformador->deixarApenasNumeros($dados['cpf']));

            $candidato->rg = $this->transformador
                    ->trim($this->transformador->deixarApenasNumeros($dados['rg']));

            $candidato->rg_org_exp = $this->transformador
                    ->trim($dados['rg_org_exp']);

            $candidato->rg_data_expedicao = $this->transformador
                    ->converterDataBrasileiraParaDateTime(
                    $this->transformador->trim($dados['rg_data_expedicao']));


            $dados['rg_uf'] = $this->transformador->trim($dados['rg_uf']);
            $rgUf = Estado::findOrFail($dados['rg_uf']);
            $candidato->rgUf()->associate($rgUf);

            $dados['cidade'] = $this->transformador->trim($dados['cidade']);
            $cidade = Cidade::findOrFail($dados['cidade']);
            $candidato->cidade()->associate($cidade);

            $dados['tipo_logradouro'] = $this->transformador->trim($dados['tipo_logradouro']);
            $tipoLogradouro = TipoLogradouro::findOrFail($dados['tipo_logradouro']);

            $candidato->tipoLogradouro()->associate($tipoLogradouro);

            $candidato->logradouro = $this->transformador->trim($dados['logradouro']);

            $candidato->numero = $this->transformador->trim($dados['numero']);

            $candidato->cep = $this->transformador
                    ->trim($this->transformador->deixarApenasNumeros($dados['cep']));

            $candidato->bairro = $this->transformador->trim($dados['bairro']);

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
