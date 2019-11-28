@extends('layouts/layout') @section('contenido')
<h1>{{$titulo}}</h1>
<a class="btn btn-link" href="/registros">Volver</a>
<canvas id="semanal" height="100"></canvas>
<canvas id="diario" height="100"></canvas>
<script>
    var ctx = document.getElementById('semanal').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
            datasets: [{
                label: 'Registros',
                data: {{json_encode($totalSemanal)}},
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<script>
    var ctx = document.getElementById('diario').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!!json_encode($dias)!!},
            datasets: [{
                label: 'Registros',
                data: {{json_encode($totalDia)}},
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
@endsection
