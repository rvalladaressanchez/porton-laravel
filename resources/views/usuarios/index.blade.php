@extends('layouts/layout') @section('contenido')
<h3>Usuarios</h3>
<a class="btn btn-link" href="/index">Volver</a>
<a class="btn btn-primary" href="/usuarios/nuevo">Nuevo</a>
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
        <td><a class="btn btn-primary btn-block" href='/usuarios/{{$usuario->id}}/edit'>Editar</a> <form action="/usuarios/{{$usuario->id}}/destroy" method="POST">@csrf<input class="btn btn-danger btn-block" type="submit" value="Borrar"/></form></td>
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
