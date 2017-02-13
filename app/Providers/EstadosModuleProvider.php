<?php

namespace Concursos\Providers;

use Illuminate\Support\ServiceProvider;
use Concursos\Modules\EstadosInterface;
use Concursos\Modules\EstadosDefault;

class EstadosModuleProvider extends ServiceProvider
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
        $this->app->bind(EstadosInterface::class, EstadosDefault::class);
    }
}
