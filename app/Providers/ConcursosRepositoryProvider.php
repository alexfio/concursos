<?php

namespace Concursos\Providers;

use Illuminate\Support\ServiceProvider;
use Concursos\Model\Repositories\ConcursosRepositoryInterface;
use Concursos\Model\Repositories\Eloquent\ConcursosRepository;

class ConcursosRepositoryProvider extends ServiceProvider
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
                ConcursosRepositoryInterface::class,
                ConcursosRepository::class
            );
    }
}
