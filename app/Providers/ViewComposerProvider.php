<?php

namespace Concursos\Providers;

use Illuminate\Support\ServiceProvider;
use Concursos\ViewComposers\CandidatoCadastroViewComposer;
use Concursos\ViewComposers\CandidatoConsultaViewComposer;
use Illuminate\Support\Facades\View;

class ViewComposerProvider extends ServiceProvider
{
    
    
    public function boot()
    {
       View::composer('candidatos.cadastro', CandidatoCadastroViewComposer::class);
       View::composer('candidatos.consultar', CandidatoConsultaViewComposer::class);
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
