@extends('layouts/layout')
@section('contenido')
<a class="btn btn-link" href="/registros">Volver</a>
<table class="table table-hover">
    <tr>
        <th>Id</th>
        <td>{{$registro->id}}</td>
    </tr>
    <tr>
        <th>Codigo</th>
        <td>{{$registro->codigo}}</td>
    </tr>
    <tr>
        <th>Nombre</th>
        <td>{{$registro->nombre}}</td>
    </tr>
    <tr>
        <th>Tipo</th>
        <td>{{$registro->tipo}}</td>
    </tr>
    <tr>
        <th>Comentario</th>
        <td>{{$registro->comentario}}</td>
    </tr>
    <tr>
        <th>Fecha</th>
        <td>{{$registro->fecha}}</td>
    </tr>
    @endsection
