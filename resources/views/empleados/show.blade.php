@extends('layouts.app')

@section('content')
    <h1>Detalles del Empleado</h1>

    <div>
        <strong>ID:</strong> {{ $empleado->id_empleado }}<br>
        <strong>Nombre:</strong> {{ $empleado->nombre }}<br>
        <strong>Apellido Paterno:</strong> {{ $empleado->apellido_paterno ?? 'N/A' }}<br>
        <strong>Apellido Materno:</strong> {{ $empleado->apellido_materno ?? 'N/A' }}<br>
        <strong>Cargo:</strong> {{ $empleado->cargo ?? 'N/A' }}<br>
        <strong>Piso:</strong> {{ $empleado->piso ?? 'N/A' }}<br>
        <strong>Departamento:</strong> {{ $empleado->departamento ?? 'N/A' }}<br>
        <strong>Sección:</strong> {{ $empleado->seccion ?? 'N/A' }}<br>
        <strong>Extensión:</strong> {{ $empleado->extension ?? 'N/A' }}<br>
    </div>

    <a href="{{ route('empleados.index') }}">Volver a la lista</a>
@endsection
