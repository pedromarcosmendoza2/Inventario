@extends('layouts.app')

@section('content')
@auth
<div class="container mt-4">
    <h2 class="mb-4 text-center">📊 Estadísticas del Inventario</h2>

    {{-- 🔹 Totales --}}
    <div class="row mb-4">
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm border-primary">
                <div class="card-header bg-primary text-white fw-bold">
                    Totales
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Empleados: {{ $stats['total_empleados'] ?? 0 }}</li>
                        <li class="list-group-item">Equipos: {{ $stats['total_equipos'] ?? 0 }}</li>
                        <li class="list-group-item">Impresoras: {{ $stats['total_impresoras'] ?? 0 }}</li>
                        <li class="list-group-item">Dispositivos de Red: {{ $stats['total_dispositivos'] ?? 0 }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- 🔹 Gráficas de Equipos de Cómputo --}}
    <h3 class="mb-3">Gráficas de Equipos de Cómputo</h3>
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white fw-bold">Equipos por Tipo</div>
                <div class="card-body">
                    <canvas id="chartEquiposTipo"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark fw-bold">Equipos por Estado</div>
                <div class="card-body">
                    <canvas id="chartEquiposEstado"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white fw-bold">Equipos por Departamento (Top 5)</div>
                <div class="card-body">
                    <canvas id="chartEquiposDepartamento"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-secondary text-white fw-bold">Equipos por Piso</div>
                <div class="card-body">
                    <canvas id="chartEquiposPiso"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- 🔹 Gráficas de Componentes --}}
    <h3 class="mb-3">Gráficas de Componentes (Pastel)</h3>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-danger text-white fw-bold">Procesadores</div>
                <div class="card-body">
                    <canvas id="chartProcesadores"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white fw-bold">Memoria RAM</div>
                <div class="card-body">
                    <canvas id="chartMemoria"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white fw-bold">Discos Duros</div>
                <div class="card-body">
                    <canvas id="chartDiscos"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const equiposTipoData = @json($stats['equipos_por_tipo'] ?? []);
    const equiposEstadoData = @json($stats['equipos_por_estado'] ?? []);
    const equiposDepartamentoData = @json($stats['equipos_por_departamento'] ?? []);
    const equiposPisoData = @json($stats['equipos_por_piso'] ?? []);
    const equiposProcesadoresData = @json($stats['equipos_por_procesador'] ?? []);
    const equiposMemoriaData = @json($stats['equipos_por_memoria'] ?? []);
    const equiposDiscosData = @json($stats['equipos_por_disco'] ?? []);

    function createBarChart(ctx, labels, data, label, bgColor) {
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: label,
                    data: data,
                    backgroundColor: bgColor,
                }]
            },
            options: {
                responsive: true,
                scales: { y: { beginAtZero: true } }
            }
        });
    }

    function createPieChart(ctx, labels, data) {
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: [
                        '#007bff', '#28a745', '#ffc107',
                        '#dc3545', '#17a2b8', '#6610f2',
                        '#fd7e14', '#6f42c1', '#20c997'
                    ],
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { position: 'bottom' } }
            }
        });
    }

    if(Object.keys(equiposTipoData).length)
        createBarChart(document.getElementById('chartEquiposTipo'), Object.keys(equiposTipoData), Object.values(equiposTipoData), 'Cantidad por Tipo', 'rgba(75, 192, 192, 0.6)');
    if(Object.keys(equiposEstadoData).length)
        createBarChart(document.getElementById('chartEquiposEstado'), Object.keys(equiposEstadoData), Object.values(equiposEstadoData), 'Cantidad por Estado', 'rgba(255, 206, 86, 0.6)');
    if(Object.keys(equiposDepartamentoData).length)
        createBarChart(document.getElementById('chartEquiposDepartamento'), Object.keys(equiposDepartamentoData), Object.values(equiposDepartamentoData), 'Cantidad por Departamento', 'rgba(54, 162, 235, 0.6)');
    if(Object.keys(equiposPisoData).length)
        createBarChart(document.getElementById('chartEquiposPiso'), Object.keys(equiposPisoData), Object.values(equiposPisoData), 'Cantidad por Piso', 'rgba(153, 102, 255, 0.6)');
    if(Object.keys(equiposProcesadoresData).length)
        createPieChart(document.getElementById('chartProcesadores'), Object.keys(equiposProcesadoresData), Object.values(equiposProcesadoresData));
    if(Object.keys(equiposMemoriaData).length)
        createPieChart(document.getElementById('chartMemoria'), Object.keys(equiposMemoriaData), Object.values(equiposMemoriaData));
    if(Object.keys(equiposDiscosData).length)
        createPieChart(document.getElementById('chartDiscos'), Object.keys(equiposDiscosData), Object.values(equiposDiscosData));
});
</script>

@else
    <!-- Pantalla para usuarios no autenticados -->
    <div class="container-fluid bg-primary text-white" style="min-height: 70vh; display: flex; align-items: center;">
        <div class="container text-center">
            <h1 class="display-4 fw-bold mb-4">Sistema de Inventario</h1>
            <p class="lead mb-4">Accede para gestionar tu inventario de TI</p>
            <div class="d-flex gap-3 justify-content-center">
                <a href="{{ route('login') }}" class="btn btn-light btn-lg px-5">Iniciar Sesión</a>
                <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg px-5">Registrarse</a>
            </div>
        </div>
    </div>
@endauth
@endsection
