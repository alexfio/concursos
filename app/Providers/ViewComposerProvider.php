<?php

namespace Concursos\Providers;

use Illuminate\Support\ServiceProvider;
use Concursos\Model\Repositories\EstadosRepositoryInterface;
use Concursos\ViewComposers\CandidatoCadastroViewComposer;
use Illuminate\Support\Facades\View;

class ViewComposerProvider extends ServiceProvider
{
    
    
    public function boot()
    {
       View::composer('candidatos.cadastro', CandidatoCadastroViewComposer::class);
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
