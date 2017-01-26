<?php

namespace Concursos\Model;

use Illuminate\Database\Eloquent\Model;
use Concursos\Model\Inscricao;
use Concursos\Model\ProvaObjetiva;
use Concursos\Model\Concurso;

class Cargo extends Model
{
    public $timestamps = false;
    
    public function inscricoes() {
        return $this->hasMany(Inscricao::class, 'cargo_id', 'id');
    }
    
    public function provasObjetivas() {
        return $this->hasMany(ProvaObjetiva::class, 'cargo_id', 'id');
    }
    
    public function concursosOndeFoiOfertado() {
        return $this->belongsToMany(
                Concurso::class, 
                'oferta_vagas', 
                'cargo_id',
                'concurso_id'
                )->withPivot(
                'vagas_ampla_concorrencia',
                'vagas_pcd',
                'qtd_aprovados_ampla_concorrencia',
                'qtd_aprovados_pcd'        
                );
    }
}
