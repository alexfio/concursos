<?php

namespace Concursos\Model;

use Illuminate\Database\Eloquent\Model;
use Concursos\Model\Candidato;

class Sexo extends Model
{
    public $timestamps = false;
    
    public function candidatos() {
        return $this->hasMany(Candidato::class, 'sexo_id', 'id');
    }
    
}
