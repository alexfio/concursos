<?php

namespace Concursos\Model;

use Illuminate\Database\Eloquent\Model;
use Concursos\Model\Candidato;
use Concursos\Model\Concurso;
use Concursos\Model\Cargo;
use Concursos\Model\Resultado;

class Inscricao extends Model
{
    protected $dates  =  [ 
        'created_at',
        'updated_at'
    ];
    
    public function getCandidato() {
        return $this->belongsTo(Candidato::class, 'candidato_id');
    }
    
    public function getConcurso() {
        return $this->belongsTo(Concurso::class, 'concurso_id');
    }
    
    public function getCargo() {
        return $this->belongsTo(Cargo::class, 'cargo_id');
    }
    
    public function getResultado() {
        return $this->hasOne(Resultado::class, 'inscricao_id');
    }
    
}
