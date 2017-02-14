<?php

namespace Concursos\Providers;

use Illuminate\Support\ServiceProvider;
use Concursos\Model\Repositories\SituacaoConcursoRepositoryInterface;
use Concursos\Model\Repositories\Eloquent\SituacaoConcursoRepository;

class SituacaoConcursoProvider extends ServiceProvider
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
                SituacaoConcursoRepositoryInterface::class,
                SituacaoConcursoRepository::class);
    }
}
