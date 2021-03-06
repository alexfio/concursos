<?php

namespace Concursos\Providers;

use Illuminate\Support\ServiceProvider;
use Concursos\Model\Repositories\TiposLogradouroRepositoryInterface;
use Concursos\Model\Repositories\Eloquent\TiposLogradouroRepository;

class TiposLogradouroRepositoryProvider extends ServiceProvider
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
        $this->app->bind(TiposLogradouroRepositoryInterface::class, TiposLogradouroRepository::class);
    }
    
    public function provides() {
        return [TiposLogradouroRepositoryInterface::class];
    }
}
