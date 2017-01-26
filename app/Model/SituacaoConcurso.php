<?php

namespace Concursos\Model;

use Illuminate\Database\Eloquent\Model;
use Concursos\Model\Concurso;

class SituacaoConcurso extends Model
{
    public $timestamps = false;
    
    public function concursos() {
        return $this->hasMany(Concurso::class, 'situacao_concurso_id', 'id');
    }
    
}
