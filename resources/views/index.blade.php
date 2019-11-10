@extends('layouts/layout') @section('contenido')
<h1>{{$titulo}}</h1>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Codigo</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        @foreach($lista as $usuario)
        <tr>
            <td>{{$usuario->id}}</td>
            <td>{{$usuario->nombre}}</td>
            <td>{{$usuario->codigo}}</td>
            <td>{{$usuario->estado}}</td>
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
