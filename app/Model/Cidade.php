<?php

namespace Concursos\Model;

use Illuminate\Database\Eloquent\Model;
use Concursos\Model\Candidato;
use Concursos\Model\Estado;

class Cidade extends Model
{
    public $timestamps = false;
    
    public function candidatos() {
        return $this->hasMany(Candidato::class, 'cidade_id', 'id');
    }
    
    public function estado() {
        return $this->belongsTo(Estado::class, 'estado_id', 'id');
    }
}
