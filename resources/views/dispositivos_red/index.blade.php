@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Lista de Dispositivos de Red</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
            {{ session('success') }}
        </div>

        <script>
            setTimeout(function() {
                var alert = document.getElementById('success-alert');
                if (alert) {
                    alert.style.transition = 'opacity 0.5s';
                    alert.style.opacity = '0';
                    setTimeout(function() {
                        alert.remove();
                    }, 500);
                }
            }, 3000);
        </script>
    @endif

    @if(auth()->user()->canEdit())
        <a href="{{ route('dispositivos_red.create') }}" class="btn btn-primary mb-3">Crear nuevo dispositivo</a>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>No. Serie</th>
                    <th>Dirección IP</th>
                    <th>Nodo</th>
                    <th>MAC</th>
                    <th>Sisipo</th>
                    <th>Estado</th>
                    <th>Piso</th>
                    <th>Departamento</th>
                    <th>Sección</th>
                    @if(auth()->user()->canEdit())
                        <th>Acciones</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse($dispositivos as $dispositivo)
                    <tr>
                        <td>{{ $dispositivo->id_dispositivo }}</td>
                        <td>{{ $dispositivo->tipo }}</td>
                        <td>{{ $dispositivo->marca }}</td>
                        <td>{{ $dispositivo->modelo }}</td>
                        <td>{{ $dispositivo->numero_serie }}</td>
                        <td>{{ $dispositivo->direccion_ip }}</td>
                        <td>{{ $dispositivo->nodo }}</td>
                        <td>{{ $dispositivo->mac }}</td>
                        <td>{{ $dispositivo->sisipo }}</td>
                        <td>{{ $dispositivo->estado }}</td>
                        <td>{{ $dispositivo->piso }}</td>
                        <td>{{ $dispositivo->departamento }}</td>
                        <td>{{ $dispositivo->seccion }}</td>
                        @if(auth()->user()->canEdit())
                            <td>
                                <a href="{{ route('dispositivos_red.edit', $dispositivo) }}" class="btn btn-warning btn-sm me-2">Editar</a>

                                <form action="{{ route('dispositivos_red.destroy', $dispositivo) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este dispositivo?')">Eliminar</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ auth()->user()->canEdit() ? '14' : '13' }}" class="text-center">
                            No hay dispositivos registrados. 
                            @if(auth()->user()->canEdit())
                                <a href="{{ route('dispositivos_red.create') }}">Crear el primero</a>
                            @endif
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection