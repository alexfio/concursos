<?php

namespace Concursos\Model\Repositories\Eloquent;

use Concursos\Model\Repositories\ConcursosRepositoryInterface;
use Concursos\Model\Concurso;
use Concursos\Model\SituacaoConcurso;
use Illuminate\Support\Facades\DB;
use Concursos\Model\Cargo;

class ConcursosRepository implements ConcursosRepositoryInterface {

    public function saveOrUpdate(array $dados): int {

        $concurso = null;
        if (array_key_exists('id', $dados)) {
            $concurso = Concurso::findOrFail($dados['id']);
        } else {
            $concurso = new Concurso();
        }


        $id_concurso = DB::transaction(function() use ($dados, $concurso) {
            $concurso->nome = $dados['nome'];
            $concurso->descricao = $dados['descricao'];
            $concurso->edital = $dados['edital'];
            $concurso->data_inicio_inscricoes = $dados['data_inicio_inscricoes'];
            $concurso->data_termino_inscricoes = $dados['data_termino_inscricoes'];
            $concurso->zerar_alguma_prova_elimina_candidato = 
                    $dados['zerar_alguma_prova_elimina_candidato'];

            $situacao = SituacaoConcurso::findOrFail($dados['situacao_concurso_id']);

            $concurso->situacaoConcurso()->associate($situacao);
            $concurso->save();
            
            $cargos = $dados['cargos'];
           
            foreach($cargos as $dadosCargo) {
                $cargo = null;
                if(array_key_exists("id", $cargos)) 
                    $cargo =  Cargo::findOrFail($cargos['id']);
                else 
                    $cargo = new Cargo();
                
                $cargo->nome = $dadosCargo['nome_cargo'];
                $cargo->vagas_ampla_concorrencia = $dadosCargo['vagas_ampla'];
                $cargo->vagas_pcd = $dadosCargo['vagas_pcd'];
                $cargo->qtd_aprovados_ampla_concorrencia = 
                        $dadosCargo['qtd_aprovados_ampla'];
                $cargo->qtd_aprovados_pcd = $dadosCargo['qtd_aprovados_pcd'];
                
                $cargo->concurso()->associate($concurso);
                
                $cargo->save();
                
                
            }
            
   
            return $concurso->id;
        });
        
        return $id_concurso;
    }

}
