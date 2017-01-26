<?php

namespace Concursos\Model;

use Illuminate\Database\Eloquent\Model;
use Concursos\Model\Candidato;

class Cidade extends Model
{
    public $timestamps = false;
    
    public function candidatos() {
        return $this->hasMany(Candidato::class, 'cidade_id', 'id');
    }
}
