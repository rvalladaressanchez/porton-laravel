<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControladorRegistro extends Controller
{
    public function index()
    {
        return View('registros/index')
        ->with('titulo', 'Registros')
        ->with('lista', DB::table('registros')->orderBy('id', 'desc')->get());
    }
    public function show($idRegistro)
    {
        return View('registros/show')
        ->with('titulo', 'Registro')
        ->with('registro', DB::table('registros')->where('id', '=', $idRegistro)->first());
    }
    public function grafico()
    {
        $totalSemana = array();
        $totalDia = array();
        $dias = array();
        foreach (DB::select(DB::raw('select count(*) as "count"  from registros group by dayofweek(fecha)')) as $i) {
            array_push($totalSemana, $i->count);
        }
        foreach (DB::select(DB::raw('select count(*) as "count" from registros group by Date(fecha)')) as $i) {
            array_push($totalDia, $i->count);
        }
        foreach (DB::select(DB::raw('select distinct date(fecha) as "count" from registros')) as $i) {
            array_push($dias, $i->count);
        }

        return View('registros/grafico')
        ->with('totalSemanal', $totalSemana)
        ->with('totalDia', $totalDia)
        ->with('dias',$dias)
        ->with('titulo', 'Grafico');
    }
}
