<?php

namespace Concursos\Http\Controllers;

use Illuminate\Http\Request;

class ConcursosController extends Controller
{
    public function index() {
        return view('concursos.index');
    }
}
