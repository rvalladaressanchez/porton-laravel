<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControladorRegistro extends Controller
{
    public function index(){
        return View('registros/index')
        ->with('titulo','Registros')
        ->with('lista',DB::table('registros')->orderBy('id', 'desc')->get());
    }
    public function registrosUsuario($idUsuario){

    }
    public function show($idRegistro){

    }
}
