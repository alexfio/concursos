<?php

namespace Concursos\Providers;

use Illuminate\Support\ServiceProvider;
use Concursos\Helpers\TransformadorDadosInterface;
use Concursos\Helpers\TransformadorDadosDefault;

class TransformadorDadosProvider extends ServiceProvider
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
        $this->app->bind(TransformadorDadosInterface::class, TransformadorDadosDefault::class);
    }
}
