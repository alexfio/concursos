<?php

namespace Concursos\Model;

use Illuminate\Database\Eloquent\Model;
use Concursos\Model\TipoLogradouro;
use Concursos\Model\Estado;
use Concursos\Model\Cidade;
use Concursos\Model\Inscricao;
use Concursos\Model\Sexo;

class Candidato extends Model
{
    protected $dates = [
        'nascimento',
        'data_expedicao',
        'created_at', 
        'updated_at',
     ];
    
    public function sexo() {
        return $this->belongsTo(Sexo::class, 'sexo_id', 'id');
    }
    
    public function tipoLogradouro() {
        return $this->belongsTo(TipoLogradouro::class, 'tipo_logradouro_id', 'id');
    }
    
    public function rgUf() {
        return $this->belongsTo(Estado::class, 'rg_uf', 'id');
    }
    
    public function cidade() {
        return $this->belongsTo(Cidade::class, 'cidade_id', 'id');
    }
    
    public function inscricoes() {
        return $this->hasMany(Inscricao::class, 'candidato_id', 'id');
    } 
    
    
}
