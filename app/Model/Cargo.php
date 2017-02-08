<?php

namespace Concursos\Model;

use Illuminate\Database\Eloquent\Model;
use Concursos\Model\Inscricao;
use Concursos\Model\ProvaObjetiva;
use Concursos\Model\Concurso;

class Cargo extends Model
{
    public $timestamps = false;
    
    public function inscricoes() {
        return $this->hasMany(Inscricao::class, 'cargo_id', 'id');
    }
    
    public function provasObjetivas() {
        return $this->hasMany(ProvaObjetiva::class, 'cargo_id', 'id');
    }
    
    public function concurso() {
        return $this->belongsTo(Concurso::class, 'concurso_id', 'id');
    }
}
