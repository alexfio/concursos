<?php

namespace Concursos\Helpers;

use Concursos\Helpers\GerenciadorEmailInterface;
use Illuminate\Contracts\Mail\Mailer;

class GerenciadorEmailDefault implements GerenciadorEmailInterface {
    private $motorEmail;
    
    public function __construct(Mailer $motorEmail) {
        $this->motorEmail = $motorEmail;
    }
    
    public function enviar(string $destinatario, string $assunto, string $corpo, array $anexos = []): bool {
       return true;
    }

}