<?php

namespace Concursos\Model;

use Illuminate\Database\Eloquent\Model;
use Concursos\Model\Inscricao;

class Resultado extends Model
{
    public $timestamps = false;
    public $primaryKey =  'inscricao_id';
    public $incrementing = false;
    
    public function getInscricao() {
        return $this->belongsTo(Inscricao::class, 'inscricao_id');
    }
}
