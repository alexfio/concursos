<?php

namespace Concursos\Model;

use Illuminate\Database\Eloquent\Model;
use Concursos\Model\Candidato;
use Concursos\Model\Concurso;
use Concursos\Model\Cargo;
use Concursos\Model\Resultado;
use Concursos\Model\ProvaObjetiva;


class Inscricao extends Model
{
    protected $dates  =  [ 
        'created_at',
        'updated_at'
    ];
    
    public function candidato() {
        return $this->belongsTo(Candidato::class, 'candidato_id', 'id');
    }
    
    public function concurso() {
        return $this->belongsTo(Concurso::class, 'concurso_id', 'id');
    }
    
    public function cargo() {
        return $this->belongsTo(Cargo::class, 'cargo_id', 'id');
    }
    
    public function resultado() {
        return $this->hasOne(Resultado::class, 'inscricao_id', 'id');
    }
    
    public function provasObjetivasRealizadas() {
        return $this->belongsToMany(ProvaObjetiva::class, 
                'respostas', 'inscricao_id', 'prova_id')
                ->withPivot(
                    'resposta', 'qtd_acertos_preliminar',
                    'qtd_pontos_obtidos_preliminar', 'qtd_acertos_definitivo',
                    'qtd_pontos_obtidos_definitivo' 
                );
    }
    
    
    
}
