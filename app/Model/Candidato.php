<?php

namespace Concursos\Model;

use Illuminate\Database\Eloquent\Model;
use Concursos\Model\TipoLogradouro;
use Concurso\Model\Estado;
use Concurso\Model\Cidade;
use Concursos\Model\Inscricao;

class Candidato extends Model
{
    protected $dates = [
        'nascimento',
        'data_expedicao',
        'created_at', 
        'updated_at',
     ];
    
    public $timestamps = false;
    
    public function getTipoLogradouro() {
        return $this->belongsTo(TipoLogradouro::class, 'tipo_logradouro_id');
    }
    
    public function getRgUf() {
        return $this->belongsTo(Estado::class, 'rg_uf');
    }
    
    public function getCidade() {
        return $this->belongsTo(Cidade::class, 'cidade_id');
    }
    
    public function getInscricoes() {
        return $this->hasMany(Inscricao::class, 'candidato_id');
    } 
}
