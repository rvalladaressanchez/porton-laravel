<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ViewErrorBag;

class ControladorUsuario extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('usuarios/index')
        ->with('titulo', 'Usuarios')
        ->with('lista', DB::table('usuarios')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('usuarios/new')
        ->with('titulo', 'Nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (isset($_POST['txtEstado'])) {
            $estado = 1;
        } else {
            $estado = 0;
        }
        DB::table('usuarios')->insert([
            'nombre'=>$_POST['txtNombre'],
            'codigo'=>$_POST['txtCodigo'],
            'estado'=>$estado
        ]);
        return redirect('/usuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return DB::table('usuarios')->where('id', '=', $id)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return View('usuarios/edit')
        ->with('titulo', 'Editar')
        ->with('usuario', $this->show($id))
        ->with('lista', DB::table('registros')->where('nombre', '=', $this->show($id)->nombre)->orderby('id','desc')->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (isset($_POST['txtEstado'])) {
            $estado = 1;
        } else {
            $estado = 0;
        }
        DB::table('usuarios')->where('id', '=', $id)->update([
            'nombre'=>$_POST['txtNombre'],
            'codigo'=>$_POST['txtCodigo'],
            'estado'=>$estado
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('usuarios')->where('id', '=', $id)->delete();
        return redirect('/usuarios');
    }
}
