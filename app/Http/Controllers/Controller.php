<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ControladorRegistro;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index()
    {
        $totalRegistros = ControladorRegistro::getRegistros()->count();
        $promedioDia = number_format($totalRegistros/(int)(date_diff(date_create("2019-09-23 20:16:17"),now())->format("%a")),2);
        $registrosHoy = ControladorRegistro::getRegistrosFecha(now())->count();
        $ultimosRegistros= ControladorRegistro::getUltimosRegistros(5);
        $ranking = ControladorRegistro::getRankingUsuarios(5);
        $valoresGrafico = ControladorRegistro::getRegistrosGraficoHora();
        return View('index')
            ->with('titulo', 'Index')
            ->with('ultimosRegistros',$ultimosRegistros)
            ->with('registrosHoy',$registrosHoy)
            ->with('totalRegistros', $totalRegistros)
            ->with('promedioDia', $promedioDia)
            ->with('ranking',$ranking)
            ->with('valoresGrafico',$valoresGrafico);
    }
}
