<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function login()
    {
        $login=$_POST['txtUsuario'];
        $password=$_POST['txtPass'];
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
        if (session('usuario')==null) {
            return redirect('login');
        }

        return View('index')
        ->with('titulo', 'Index')
        ->with('lista', DB::table('usuarios')->get());
    }
}
