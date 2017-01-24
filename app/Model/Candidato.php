<?php

namespace Concursos\Model;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    protected $dates = [
        'nascimento',
        'data_expedicao',
        'created_at', 
        'updated_at',
     ];
    
    public $timestamps = false;
}
