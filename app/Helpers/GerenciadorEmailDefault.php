<?php

namespace Concursos\Helpers;

use Concursos\Helpers\GerenciadorEmailInterface;

class GerenciadorEmailDefault implements GerenciadorEmailInterface {
    
    public function enviar(string $destinatario, string $assunto, string $corpo, array $anexos): bool {
        
    }

}