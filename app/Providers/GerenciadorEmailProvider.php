<?php

namespace Concursos\Providers;

use Illuminate\Support\ServiceProvider;
use Concursos\Helpers\GerenciadorEmailInterface;
use Concursos\Helpers\GerenciadorEmailDefault;
use Illuminate\Contracts\Mail\Mailer;

class GerenciadorEmailProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(GerenciadorEmailInterface::class, function($app){
            return new GerenciadorEmailDefault($app->make(Mailer::class));
        });
    }
}
