<?php

namespace Concursos\Providers;

use Illuminate\Support\ServiceProvider;
use Concursos\Modules\ConcursosInterface;
use Concursos\Modules\ConcursosDefault;
use Concursos\Model\Repositories\ConcursosRepositoryInterface;
use Concursos\Helpers\TransformadorDadosInterface;



class ConcursosModuleProvider extends ServiceProvider
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
       $this->app->bind(ConcursosInterface::class, function($app) {
            
           $repositorio = $app->make(ConcursosRepositoryInterface::class);
           $transformador = $app->make(TransformadorDadosInterface::class);
            
            
            return new ConcursosDefault($repositorio, $transformador);
        });
    }
}
