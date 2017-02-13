<?php

namespace Concursos\Providers;

use Illuminate\Support\ServiceProvider;
use Concursos\Modules\CandidatosInterface;
use Concursos\Modules\CandidatosDefault;
use Concursos\Model\Repositories\CandidatosRepositoryInterface;
use Concursos\Helpers\TransformadorDadosInterface;

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
            
            $transformador = $app->make(TransformadorDadosInterface::class);
            $repositorio = $app->make(CandidatosRepositoryInterface::class);
            
            return new CandidatosDefault($repositorio, $transformador);
        });
    }
    
    
}
