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


Route::get('/admin', 'AdminController@index');
Route::get('/admin/candidatos/', 'CandidatosController@index');
Route::get('/admin/concursos/', 'ConcursosController@index');
Route::get('/admin/inscricoes/', 'InscricoesController@index');
Route::get('/admin/candidatos/consulta', 'CandidatosController@carregarViewConsulta');

Route::get('/admin/candidatos/cadastro', 'CandidatosController@carregarViewCadastrar');
Route::get('/admin/candidatos/editar/{id}', 'CandidatosController@carregarViewEditar')->where('id', '^[0-9]+$');
Route::get('/admin/candidatos/consultar/{id}', 'CandidatosController@carregarViewConsultar')->where('id', '^[0-9]+$');
Route::post('/admin/candidatos/cadastrar', 'CandidatosController@cadastrar');
Route::post('/admin/candidatos/atualizar', 'CandidatosController@atualizar');
Route::match(['post', 'get'],'/admin/candidatos/consultar', 'CandidatosController@consultar');
Route::get('/admin/concursos/cadastro', 'ConcursosController@carregarViewCadastrar');
Route::get('/admin/concursos/cadastrar', 'ConcursosController@cadastrar');


Auth::routes();


