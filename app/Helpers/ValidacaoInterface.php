<?php

namespace Concursos\Helpers;

interface ValidacaoInterface {
    public function cpfEhValido(string $cpf) : bool;
}