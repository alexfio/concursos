<?php

namespace Concursos\Providers;

use Illuminate\Support\ServiceProvider;
use Concursos\Modules\CandidatosInterface;
use Concursos\Modules\CandidatosDefault;
use Concursos\Model\Repositories\CandidatosRepositoryInterface;

class CandidatosModuleProvider extends ServiceProvider
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
        $this->app->bind(CandidatosInterface::class, function($app) {
            return new 
            CandidatosDefault($app->make(CandidatosRepositoryInterface::class));
        });
    }
}
