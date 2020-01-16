@extends('layouts/layout')
@section('contenido')
<a class="btn btn-link" href="/usuarios">Volver</a>
<form action="{{url('usuarios/'.$usuario->id.'/edit')}}" method="post">
    @csrf
    <table class="table table-hover">
        <tr>
            <th>Id</th>
            <td><input readonly type="text" class="form-control" value="{{$usuario->id}}" /></td>
        </tr>
        <tr>
            <th>Nombre</th>
            <td><input name="txtNombre" type="text" class="form-control" value="{{$usuario->nombre}}" /></td>
        </tr>
        <tr>
            <th>Codigo</th>
            <td><input name="txtCodigo" maxlength="5" type="text" class="form-control" value="{{$usuario->codigo}}" /></td>
        </tr>
        <tr>
            <th>Activo</th>
            <td><input name="txtEstado" type="checkbox" @if($usuario->estado==1) checked @endif/></td>
        </tr>
        <tr>
            <td colspan="2">
                <input class="btn btn-primary btn-lg btn-block" type="submit" value="Actualizar" />
            </td>
        </tr>
    </table>
</form>
<hr>
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
