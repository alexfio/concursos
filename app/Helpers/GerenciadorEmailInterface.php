<?php

namespace Concursos\Helpers;

interface GerenciadorEmailInterface {
    public function enviar(string $destinatario, string $assunto, string $corpo, array $anexos) : bool;
    
    
}