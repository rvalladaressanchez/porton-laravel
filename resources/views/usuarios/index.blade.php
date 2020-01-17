@extends('layouts/layout') @section('contenido')
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link" href="/index"><i class="fas fa-ad"></i> Volver</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/usuarios/nuevo"><i class="fas fa-user-plus"></i> Nuevo</a>
    </li>
</ul>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Codigo</th>
            <th>Estado</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>
        @foreach($lista as $usuario)
        <tr>
            <td>{{$usuario->id}}</td>
            <td>{{$usuario->nombre}}</td>
            <td>{{$usuario->codigo}}</td>
            <td>{{$usuario->estado}}</td>
            <td>
                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            <a class="btn btn-primary btn-block" href='/usuarios/{{$usuario->id}}/edit'>Editar</a>
                        </div>
                        <div class="col-sm">
                            <form action="/usuarios/{{$usuario->id}}/destroy" method="POST">
                                @csrf
                                <input class="btn btn-danger btn-block" type="submit" value="Borrar" />
                            </form>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
        @empty($lista)
        <tr>
            <td colspan="4">Sin usuarios</td>
        </tr>
        @endempty
    </tbody>
</table>
@endsection