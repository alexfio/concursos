<?php

namespace Concursos\Model;

use Illuminate\Database\Eloquent\Model;
use Concursos\Model\Concurso;
use Concursos\Model\Cargo;
use Concursos\Model\Disciplina;
use Concursos\Model\Inscricao;

class ProvaObjetiva extends Model
{
    public $timestamps = false;
    
    public function cargo() {
        return $this->belongsTo(Cargo::class, 'cargo_id', 'id');
    }
    
    public function concurso() {
       return $this->belongsTo(Concurso::class, 'concurso_id', 'id'); 
    }
    
    public function disciplina() {
        return $this->belongsTo(Disciplina::class, 'disciplna_id', 'id');
    }
    
    public function inscricoes() {
        return $this->belongsToMany(
                Inscricao::class, 
                'respostas',
                'prova_id',
                'inscricao_id'
                )->withPivot(
                'resposta',
                'qtd_acertos_preliminar',
                'qtd_pontos_obtidos_preliminar',
                'qtd_acertos_definitivo',
                'qtd_pontos_obtidos_definitivo'      
                );
                
    }
    
}
