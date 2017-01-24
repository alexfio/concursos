<?php

namespace Concursos\Model;

use Illuminate\Database\Eloquent\Model;

class Concurso extends Model
{
    protected $dates = [
      'created_at'  ,
      'updated_at' ,
      'data_inicio_inscricoes' ,
      'data_termino_inscricoes' ,  
    ];
}
