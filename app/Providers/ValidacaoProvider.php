<?php

namespace Concursos\Providers;

use Illuminate\Support\ServiceProvider;
use Concursos\Helpers\ValidacaoInterface;
use Concursos\Helpers\ValidacaoDefault;

class ValidacaoProvider extends ServiceProvider
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
        $this->app->bind(ValidacaoInterface::class, ValidacaoDefault::class);
    }
    
    public function provides() {
        return [ValidacaoInterface::class];
    }
}
