<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function login()
    {
        $login = $_POST['txtUsuario'];
        $password = $_POST['txtPass'];
        if ($login == '187816203' && $password == 'rodrigo6747') {
            session()->put('usuario', $login);
            return redirect("/index");
        }
        return redirect("/login");
    }
    public function logout()
    {
        session()->put('usuario', null);
        return redirect('/login');
    }
    public function index()
    {
        $totalRegistros = DB::table('registros')->count();
        $promedioDia = number_format($totalRegistros/(int)(date_diff(date_create("2019-09-23 20:16:17"),now())->format("%a")),2);
        $registrosHoy = DB::table('registros')->whereDate('fecha',now())->count();
        $ultimosRegistros= DB::table('registros')->orderBy('id','DESC')->limit(5)->get();
        $ranking = DB::table('registros')->select('codigo as usuario', DB::raw('COUNT(codigo) AS occurrences'))
        ->groupBy('codigo')
        ->orderBy('occurrences', 'DESC')
        ->limit(5)
        ->get();
        foreach($ranking as $usuario){
            $usuario->usuario = DB::table('usuarios')->where('codigo',"=",$usuario->usuario)->first()->nombre;
        }
        return View('index')
            ->with('titulo', 'Index')
            ->with('ultimosRegistros',$ultimosRegistros)
            ->with('registrosHoy',$registrosHoy)
            ->with('totalRegistros', $totalRegistros)
            ->with('promedioDia', $promedioDia)
            ->with('ranking',$ranking);
    }
}
