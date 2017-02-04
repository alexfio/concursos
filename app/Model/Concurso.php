<?php

namespace Concursos\Model;

use Illuminate\Database\Eloquent\Model;
use Concursos\Model\SituacaoConcurso;
use Concursos\Model\Inscricao;
use Concursos\Model\ProvaObjetiva;
use Concursos\Model\Cargo;

class Concurso extends Model
{
    protected $dates = [
      'created_at'  ,
      'updated_at' ,
      'data_inicio_inscricoes' ,
      'data_termino_inscricoes' ,  
    ];
    
    public function situacaoConcurso() {
        return $this->belongsTo(SituacaoConcurso::class, 'situacao_concurso_id', 'id');
    }
    
    public function inscricoes() {
        return $this->hasMany(Inscricao::class, 'concurso_id', 'id' );
    }
    
    public function provasObjetivas() {
        return $this->hasMany(ProvaObjetiva::class, 'concurso_id', 'id');
    }
    
    public function cargosOfertados() {
        return $this->hasMany(Cargo::class, 'concurso_id', 'id');
    }
    
    
    
}
