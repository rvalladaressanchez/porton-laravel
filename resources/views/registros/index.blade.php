@extends('layouts/layout') @section('contenido')
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link" href="/index"><i class="fa fa-arrow-left"></i> Volver</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/registros/grafico"><i class="fa fa-chart-bar"></i>Ver grafico</a>
    </li>
</ul>
<table class="sortable table table-bordered">
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
            @switch($registro->tipo)
            @case("acceso-permitido")
            <td class="text-success font-weight-bold">{{$registro->tipo}}</td>
            @break
            @case("no-registrado")
            <td class="text-warning font-weight-bold">{{$registro->tipo}}</td>
            @break
            @case("acceso-denegado")
            <td class="text-danger font-weight-bold">{{$registro->tipo}}</td>
            @break
            @endswitch
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