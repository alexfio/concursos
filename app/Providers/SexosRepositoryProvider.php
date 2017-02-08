<?php

namespace Concursos\Providers;

use Illuminate\Support\ServiceProvider;
use Concursos\Model\Repositories\SexoRepositoryInterface;
use Concursos\Model\Repositories\Eloquent\SexoRepository;

class SexosRepositoryProvider extends ServiceProvider
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
        $this->app->bind(SexoRepositoryInterface::class, SexoRepository::class);
    }
}
