<?php

namespace Concursos\Model;

use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    protected $dates = [
        'created_at',
        'updated_at'
    ];
    
    public $timestamps = false;
}
