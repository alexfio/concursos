<?php

namespace Concursos\Providers;

use Illuminate\Support\ServiceProvider;
use Concursos\Model\Repositories\CandidatosRepositoryInterface;
use Concursos\Model\Repositories\Eloquent\CandidatosRepository;


class CandidatosRepositoryProvider extends ServiceProvider
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
         $this->app->bind(
                 CandidatosRepositoryInterface::class, 
                 CandidatosRepository::class);
         
    }
    
   
}
