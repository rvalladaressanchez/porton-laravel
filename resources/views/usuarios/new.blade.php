@extends('layouts/layout')
@section('contenido')
<form action="{{url('usuarios/store')}}" method="post">
    @csrf
    <table class="table table-hover">
        <tr>
            <th>Nombre</th>
            <td><input name="txtNombre" type="text" class="form-control"/></td>
        </tr>
        <tr>
            <th>Codigo</th>
            <td><input name="txtCodigo" maxlength="5" type="text" class="form-control"/></td>
        </tr>
        <tr>
            <th>Activo</th>
            <td><input name="txtEstado" type="checkbox" checked/></td>
        </tr>
        <tr>
            <td colspan="2">
                <input class="btn btn-primary btn-lg btn-block" type="submit" value="Crear"/>
            </td>
        </tr>
    </table>
</form>
@endsection
