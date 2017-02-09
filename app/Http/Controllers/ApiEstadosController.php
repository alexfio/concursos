<?php

namespace Concursos\Http\Controllers;

use Illuminate\Http\Request;
use Concursos\Modules\EstadosInterface;

class ApiEstadosController extends Controller {
    
    private $moduloEstados;
    
    public function __construct(EstadosInterface $moduloEstados) {
        $this->moduloEstados = $moduloEstados;
    }
    
    public function getCidadesByEstado($idEstado) {
        return $this->moduloEstados->obterCidadesByEstado($idEstado);
    }
    
}