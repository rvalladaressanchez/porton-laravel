@extends('layouts/layout') @section('contenido')
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link" href="/index"><i class="fas fa-arrow-left"></i> Volver</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/usuarios/nuevo"><i class="fas fa-user-plus"></i> Nuevo</a>
    </li>
</ul>
<table class="table table-bordered sortable">
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
            @if($usuario->estado==1)
            <td><i class="fas fa-check"></i></td>
            @else
            <td><i class="fas fa-ban"></i></td>
            @endif
            <td>
                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            <a class="btn btn-primary btn-block" href='/usuarios/{{$usuario->id}}/edit'><i class="fas fa-user-edit"></i> Editar</a>
                        </div>
                        <div class="col-sm">
                            <form action="/usuarios/{{$usuario->id}}/destroy" method="POST">
                                @csrf
                                <button class="btn btn-danger btn-block" type="submit"><i class="fas fa-user-minus"></i> Borrar</button>
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