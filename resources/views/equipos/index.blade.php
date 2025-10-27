@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Lista de Equipos</h1>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                {{ session('success') }}
            </div>

            <script>
                // Desaparecer automáticamente después de 3 segundos
                setTimeout(function() {
                    var alert = document.getElementById('success-alert');
                    if (alert) {
                        alert.style.transition = 'opacity 0.5s';
                        alert.style.opacity = '0';
                        setTimeout(function() {
                            alert.remove();
                        }, 500);
                    }
                }, 3000); // 3000 milisegundos = 3 segundos
            </script>
        @endif

        @if(auth()->user()->canEdit())
            <a href="{{ route('equipos.create') }}" class="btn btn-primary mb-3">Crear nuevo equipo</a>
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
                        <th>IP</th>
                        <th>Estado</th>
                        <th>Piso</th>
                        <th>Departamento</th>
                        <th>Empleado</th>
                        <th>Procesador</th>
                        <th>Disco</th>
                        <th>Memoria</th>
                        <th>Tipo conexión</th>
                        <th>Nodo</th>
                        <th>MAC</th>
                        <th>Sisipo</th>
                        @if(auth()->user()->canEdit())
                            <th>Acciones</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse($equipos as $equipo)
                        <tr>
                            <td>{{ $equipo->id }}</td>
                            <td>{{ $equipo->tipo }}</td>
                            <td>{{ $equipo->marca }}</td>
                            <td>{{ $equipo->modelo }}</td>
                            <td>{{ $equipo->numero_serie }}</td>
                            <td>{{ $equipo->direccion_ip }}</td>
                            <td>{{ $equipo->estado }}</td>
                            <td>{{ $equipo->piso }}</td>
                            <td>{{ $equipo->departamento }}</td>
                            <td>
                                @if($equipo->empleado)
                                    {{ $equipo->empleado->nombre }} {{ $equipo->empleado->apellido_paterno }}
                                @else
                                    <span class="text-muted">Sin asignar</span>
                                @endif
                            </td>
                            <td>{{ $equipo->procesador }}</td>
                            <td>{{ $equipo->tecnologia_disco }}</td>
                            <td>{{ $equipo->tecnologia_memoria }}</td>
                            <td>{{ $equipo->tipo_conexion }}</td>
                            <td>{{ $equipo->nodo }}</td>
                            <td>{{ $equipo->mac }}</td>
                            <td>{{ $equipo->sisipo }}</td>
                            @if(auth()->user()->canEdit())
                                <td>
                                    <!-- Botón para editar -->
                                    <a href="{{ route('equipos.edit', $equipo->id) }}" class="btn btn-warning btn-sm">Editar</a>

                                    <!-- Formulario para eliminar -->
                                    <form action="{{ route('equipos.destroy', $equipo->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este equipo?')">Eliminar</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ auth()->user()->canEdit() ? '18' : '17' }}" class="text-center">
                                No hay equipos registrados. 
                                @if(auth()->user()->canEdit())
                                    <a href="{{ route('equipos.create') }}">Crear el primero</a>
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection