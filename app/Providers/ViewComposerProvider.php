<?php

namespace Concursos\Providers;

use Illuminate\Support\ServiceProvider;
use Concursos\ViewComposers\CandidatoCadastroViewComposer;
use Concursos\ViewComposers\CandidatoConsultaViewComposer;
use Concursos\ViewComposers\ConcursoCadastroViewComposer;
use Illuminate\Support\Facades\View;

class ViewComposerProvider extends ServiceProvider
{
    
    
    public function boot()
    {
       View::composer('candidatos.cadastro', CandidatoCadastroViewComposer::class);
       View::composer('candidatos.consultar', CandidatoConsultaViewComposer::class);
       View::composer('concursos.cadastro', ConcursoCadastroViewComposer::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
