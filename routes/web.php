<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Concursos\Model\Repositories\EstadosRepositoryInterface;
use Concursos\Modules\CandidatosInterface;
Route::get('/', function (CandidatosInterface $can) {
        
        $dados['nome'] = '      Flávia Adriana Mena Rebouças';
        $dados['nascimento'] = '08/03/1975';
        $dados['email'] = 'glamreboucas@gmail.com';
        $dados['telefone_residencial'] = '(011)32232416';
        $dados['telefone_celular'] = '(011)996511476';
        $dados['cpf'] = '674.834.060-89';
        $dados['rg'] = '3003004000246';
        $dados['rg_org_exp'] = 'SSP';
        $dados['rg_uf'] = 25;
        $dados['rg_data_expedicao'] = '17/08/1987';
        $dados['cidade'] = 4850;
        $dados['tipo_logradouro'] = 1;
        $dados['logradouro'] = 'Campinas';
        $dados['numero'] = '1533';
        $dados['cep'] = '60020295';
        $dados['bairro'] = 'Higienópolis';
      echo   $can->cadastrarOuAtualizar($dados);
    
});
