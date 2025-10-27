@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Lista de Impresoras</h1>

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
            <a href="{{ route('impresoras.create') }}" class="btn btn-primary mb-3">Crear nueva impresora</a>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
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
                    @forelse($impresoras as $impresora)
                        <tr>
                            <td>{{ $impresora->id_impresora }}</td>
                            <td>{{ $impresora->marca }}</td>
                            <td>{{ $impresora->modelo }}</td>
                            <td>{{ $impresora->numero_serie }}</td>
                            <td>{{ $impresora->direccion_ip }}</td>
                            <td>{{ $impresora->nodo }}</td>
                            <td>{{ $impresora->mac }}</td>
                            <td>{{ $impresora->sisipo }}</td>
                            <td>{{ $impresora->estado }}</td>
                            <td>{{ $impresora->piso }}</td>
                            <td>{{ $impresora->departamento }}</td>
                            <td>{{ $impresora->seccion }}</td>
                            @if(auth()->user()->canEdit())
                                <td>
                                    <!-- Botón para editar -->
                                    <a href="{{ route('impresoras.edit', $impresora->id_impresora) }}" class="btn btn-warning btn-sm">Editar</a>

                                    <!-- Formulario para eliminar -->
                                    <form action="{{ route('impresoras.destroy', $impresora->id_impresora) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar esta impresora?')">Eliminar</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ auth()->user()->canEdit() ? '13' : '12' }}" class="text-center">
                                No hay impresoras registradas. 
                                @if(auth()->user()->canEdit())
                                    <a href="{{ route('impresoras.create') }}">Crear la primera</a>
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection