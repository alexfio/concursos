<?php

namespace Concursos\Model;

use Illuminate\Database\Eloquent\Model;
use Concursos\Model\ProvaObjetiva;

class Disciplina extends Model
{
    public $timestamps = false;
    public function provasObjetivas() {
        return $this->hasMany(ProvaObjetiva::class, 'disciplina_id', 'id');
    }
    
    
}
