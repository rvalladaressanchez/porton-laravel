@extends('layouts/layout') @section('contenido')
<h1>{{$titulo}}</h1>
<a class="btn btn-primary btn-block btn-lg" href="/usuarios">Usuarios</a>
<a class="btn btn-primary btn-block btn-lg" href="/registros">Registros</a>
<hr>
<div class="card-deck">
    <div class="card" style="width: 18rem;">
        <div class="card-body text-center">
            <h5 class="card-title display-1">~10</h5>
            <p class="card-text">Promedio diario</p>
        </div>
        <div class="card-footer">
            <a href="#" class="btn btn-primary btn-block btn-lg">Go somewhere</a>
        </div>
    </div>
    <div class="card" style="width: 18rem;">
        <div class="card-body text-center">
            <h5 class="card-title display-1">1481</h5>
            <p class="card-text">Total registros</p>
        </div>
        <div class="card-footer">
            <a href="#" class="btn btn-primary btn-block btn-lg">Go somewhere</a>
        </div>
    </div>
    <div class="card" style="width: 18rem;">
        <div class="card-body text-center">
            <h5 class="card-title display-4">Ranking</h5>
            <ul>
                <li>#1 Rodrigo (50 registros)</li>
                <li>#2 Rodrigo (45 registros)</li>
                <li>#3 Rodrigo (40 registros)</li>
                <li>#4 Rodrigo (20 registros)</li>
                <li>#5 Rodrigo (15 registros)</li>
            </ul>
        </div>
        <div class="card-footer">
            <a href="#" class="btn btn-primary btn-block btn-lg">Go somewhere</a>
        </div>
    </div>
</div>
@endsection