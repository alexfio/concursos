<?php

namespace Concursos\Helpers;

use Concursos\Helpers\GerenciadorEmailInterface;
use Illuminate\Support\Facades\Mail;
use Concursos\Mail\CandidatoEmailPessoal;

class GerenciadorEmailDefault implements GerenciadorEmailInterface {
    
    public function enviar(string $destinatario, string $assunto, string $corpo, array $anexos = []): bool {
        $email = new CandidatoEmailPessoal($destinatario, $assunto, $corpo);
        Mail::to($destinatario)->send($email);
        return count(Mail::failures()) == 0;
    }

}