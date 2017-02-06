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
Route::get('/admin/candidatos/consulta', 'CandidatosController@carregarViewConsulta');
Route::get('/admin/candidatos/cadastro', 'CandidatosController@carregarViewCadastrar');
Route::post('/admin/candidatos/cadastrar', 'CandidatosController@cadastrar');
Route::post('/admin/candidatos/consultar', 'CandidatosController@consultar');

Auth::routes();

//Route::get('/home', 'HomeController@index');
