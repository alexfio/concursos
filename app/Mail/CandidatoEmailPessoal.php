<?php

namespace Concursos\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CandidatoEmailPessoal extends Mailable
{
    use Queueable, SerializesModels;

    private $destinatario;
    private $assunto;
    private $corpo;
           
    
    public function __construct($destinatario, $assunto, $corpo)
    {
        $this->destinatario = $destinatario;
        $this->assunto = $assunto;
        $this->corpo = $corpo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->from('alexfiofcasf@gmail.com')
             ->to($this->destinatario)
             ->subject($this->assunto)
             ->view('emails.candidatos');
             
    }
}
