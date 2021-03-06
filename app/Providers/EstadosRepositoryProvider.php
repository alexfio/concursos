<?php

namespace Concursos\Providers;

use Illuminate\Support\ServiceProvider;
use Concursos\Model\Repositories\EstadosRepositoryInterface;
use Concursos\Model\Repositories\Eloquent\EstadosRepository;

class EstadosRepositoryProvider extends ServiceProvider

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
       
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
       $this->app->bind(EstadosRepositoryInterface::class, EstadosRepository::class);
    }
    
    public function provides() {
        return [EstadosRepositoryInterface::class];
    }
}
