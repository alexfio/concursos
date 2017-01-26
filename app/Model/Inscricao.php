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
    
}
