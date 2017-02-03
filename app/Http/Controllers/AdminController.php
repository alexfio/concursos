<?php

namespace Concursos\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view("commons.template");
    }
}
