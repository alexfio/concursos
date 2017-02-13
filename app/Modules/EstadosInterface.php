<?php
namespace Concursos\Modules;

interface EstadosInterface {
    public function obterCidadesByEstado(int $id) : array;
}
