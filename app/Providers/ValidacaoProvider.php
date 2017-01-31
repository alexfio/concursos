<?php

namespace Concursos\Providers;

use Illuminate\Support\ServiceProvider;
use Concursos\Helpers\ValidacaoInterface;
use Concursos\Helpers\ValidacaoDefault;

class ValidacaoProvider extends ServiceProvider
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
        $this->app->bind(ValidacaoInterface::class, ValidacaoDefault::class);
    }
}
