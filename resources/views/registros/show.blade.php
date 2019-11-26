@extends('layouts/layout')
@section('contenido')
<h2>{{$titulo}}</h2>
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
            <td><input name="txtCodigo" maxlength="5" type="text" class="form-control" value="{{$usuario->codigo}}" />
            </td>
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
@endsection
