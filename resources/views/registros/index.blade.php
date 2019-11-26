@extends('layouts/layout') @section('contenido')
<h3>Registros</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Comentario</th>
            <th>fecha</th>
        </tr>
    </thead>
    <tbody>
        @foreach($lista as $registro)
        <tr>
            <td><a href="/registros/{{$registro->id}}">{{$registro->id}}</a></td>
            <td>{{$registro->codigo}}</td>
            <td>{{$registro->nombre}}</td>
            <td>{{$registro->tipo}}</td>
            <td>{{$registro->comentario}}</td>
            <td>{{$registro->fecha}}</td>
        </tr>
        @endforeach
        @empty($lista)
        <tr>
            <td colspan="4">Sin registros</td>
        </tr>
        @endempty
    </tbody>
</table>
@endsection
