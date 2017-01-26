<?php

namespace Concursos\Model;

use Illuminate\Database\Eloquent\Model;
use Concursos\Model\Concurso;
use Concursos\Model\Cargo;
use Concursos\Model\Disciplina;

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
    
    
}
