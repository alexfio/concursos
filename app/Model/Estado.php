<?php

namespace Concursos\Model;

use Illuminate\Database\Eloquent\Model;
use Concursos\Model\Cidade;
use Concursos\Model\Candidato;

class Estado extends Model
{
    public $timestamps = false;
    public function cidades() {
        return $this->hasMany(Cidade::class, 'estado_id', 'id');
    }
    
    public function candidatosRgUf() {
        return $this->hasMany(Candidato::class, 'rg_uf', id);
    }
}
