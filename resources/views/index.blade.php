@extends('layouts/layout') @section('contenido')
<div class="card-deck text-center">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title display-1">~{{$promedioDia}}</h5>
            <p class="card-text text-muted">Promedio diario</p>
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <span class="text-success font-weight-bold">+{{$registrosHoy}}</span> registros hoy
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="/registros" class="btn btn-outline-primary btn-block btn-lg">Ir a Registros</a>
        </div>
    </div>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title display-1">{{$totalRegistros}}</h5>
            <p class="card-text text-muted">Total registros</p>
        </div>
        <div class="card-footer">
            <a href="/registros" class="btn btn-outline-primary btn-block btn-lg">Ir a Registros</a>
        </div>
    </div>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title display-4">Ultimos registros</h5>
            <ul class="list-unstyled text-left">
                @foreach ($ultimosRegistros as $registro)
                <li>({{date_create($registro->fecha)->format('d-m-Y H:i')}}) {{$registro->nombre}}</li>
                @endforeach
            </ul>
        </div>
        <div class="card-footer">
            <a href="/registros" class="btn btn-outline-primary btn-block btn-lg">Ir a Registros</a>
        </div>
    </div>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title display-4">Ranking</h5>
            <ul class="list-unstyled text-left">
                <li>#1 {{$ranking[0]->usuario}} ({{$ranking[0]->occurrences}} registros)</li>
                <li>#2 {{$ranking[1]->usuario}} ({{$ranking[1]->occurrences}} registros)</li>
                <li>#3 {{$ranking[2]->usuario}} ({{$ranking[2]->occurrences}} registros)</li>
                <li>#4 {{$ranking[3]->usuario}} ({{$ranking[3]->occurrences}} registros)</li>
                <li>#5 {{$ranking[4]->usuario}} ({{$ranking[4]->occurrences}} registros)</li>
            </ul>
        </div>
        <div class="card-footer">
            <a href="/usuarios" class="btn btn-outline-primary btn-block btn-lg">Ir a Usuarios</a>
        </div>
    </div>
</div>
@endsection