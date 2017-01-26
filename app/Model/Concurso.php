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
        return $this->belongsToMany(
                Cargo::class, 
                'oferta_vagas', 
                'concurso_id', 
                'cargo_id'
                )
                ->withPivot(
                'vagas_ampla_concorrencia',
                'vagas_pcd',
                'qtd_aprovados_ampla_concorrencia',
                'qtd_aprovados_pcd'        
                );
    }
    
}
