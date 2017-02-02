<?php

namespace Concursos\Providers;

use Illuminate\Support\ServiceProvider;
use Concursos\Helpers\TransformadorDadosInterface;
use Concursos\Helpers\TransformadorDadosDefault;

class TransformadorDadosProvider extends ServiceProvider
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
        $this->app->bind(TransformadorDadosInterface::class, TransformadorDadosDefault::class);
    }
    
    public function provides() {
        return [TransformadorDadosInterface::class];
    }
}
