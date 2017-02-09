<?php

namespace Concursos\Http\Controllers;

use Illuminate\Http\Request;

class InscricoesController extends Controller
{
    //Carrega a tela de concurso
    public function index() {
        return view('inscricoes.index');
    }
}
