<?php

namespace Concursos\Model;

use Illuminate\Database\Eloquent\Model;
use Concursos\Model\Candidato;

class TipoLogradouro extends Model
{
    public $timestamps = false;
    public function candidatos() {
        return $this->hasMany(Candidato::class, 'tipo_logradouro_id', 'id');
    }
}
