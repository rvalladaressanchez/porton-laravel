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
        return View('index')
            ->with('titulo', 'Index')
            ->with('totalRegistros', $totalRegistros)
            ->with('promedioDia', $promedioDia);
    }
}
