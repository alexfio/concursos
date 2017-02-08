<?php

namespace Concursos\Providers;

use Illuminate\Support\ServiceProvider;
use Concursos\Model\Repositories\CandidatosRepositoryInterface;
use Concursos\Model\Repositories\Eloquent\CandidatosRepository;


class CandidatosRepositoryProvider extends ServiceProvider
{
    
    protected $defer;
    
    public function __construct($app) {
        parent::__construct($app);
        $this->defer = true;
    }
    
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
    
    public function provides() {
        return [CandidatosRepositoryInterface::class];
    }
}
