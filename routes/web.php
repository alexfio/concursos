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
Route::get('/', function (EstadosRepositoryInterface $rep) {
    var_dump($rep->getById(8));
    //return view('welcome');
});
