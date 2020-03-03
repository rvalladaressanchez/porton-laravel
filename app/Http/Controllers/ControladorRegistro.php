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
            ->with('dias', $dias)
            ->with('titulo', 'Grafico');
    }

    //funciones
    public static function getRegistros()
    {
        return DB::table('registros')->get();
    }
    public static function getRegistrosFecha($fecha)
    {
        return DB::table('registros')->whereDate('fecha', $fecha)->get();
    }
    public static function getUltimosRegistros($numero)
    {
        return DB::table('registros')->orderBy('id', 'DESC')->limit($numero)->get();
    }
    public static function getRankingUsuarios($numero)
    {
        $ranking = DB::table('registros')->select('codigo as usuario', DB::raw('COUNT(codigo) AS total'))
            ->groupBy('codigo')
            ->orderBy('total', 'DESC')
            ->limit($numero)
            ->get();
        foreach ($ranking as $usuario) {
            $usuario->usuario = ControladorUsuario::getUsuarioCodigo($usuario->usuario)->nombre;
        }
        return $ranking;
    }
    public static function getRegistrosGraficoHora()
    {
        $query = "select count(*) as 'count'
        FROM registros
        group by hour( fecha )";
        $valores = array();
        foreach(DB::select(DB::raw($query)) as $valor){
            array_push($valores, $valor->count);
        }
        return $valores;
    }
}
