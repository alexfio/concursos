<?php

namespace Concursos\Providers;

use Illuminate\Support\ServiceProvider;
use Concursos\Helpers\ValidacaoInterface;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(ValidacaoInterface $validacao)
    {
        //Registrando a validação de CPF...
        Validator::extend('cpf_valido', function($atributo, $valor) use ($validacao) {
            return $validacao->cpfEhValido($valor);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
