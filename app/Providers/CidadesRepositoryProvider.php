<?php

namespace Concursos\Providers;

use Illuminate\Support\ServiceProvider;
use Concursos\Model\Repositories\CidadesRepositoryInterface;
use Concursos\Model\Repositories\Eloquent\CidadesRepository;

class CidadesRepositoryProvider extends ServiceProvider
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
        $this->app->bind(CidadesRepositoryInterface::class, CidadesRepository::class);
    }
    
    
}
