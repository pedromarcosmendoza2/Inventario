@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Lista de Empleados</h1>

        {{-- ✅ Mensajes de éxito o error --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        @endif

        @if(auth()->user()->canEdit())
            <a href="{{ route('empleados.create') }}" class="btn btn-primary mb-3">Crear nuevo empleado</a>
        @endif

        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Cargo</th>
                    <th>Piso</th>
                    <th>Departamento</th>
                    <th>Sección</th>
                    <th>Extensión</th>
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
                @forelse($empleados as $empleado)
                    <tr>
                        <td>{{ $empleado->id_empleado }}</td>
                        <td>{{ $empleado->nombre }}</td>
                        <td>{{ $empleado->apellido_paterno }}</td>
                        <td>{{ $empleado->apellido_materno }}</td>
                        <td>{{ $empleado->cargo }}</td>
                        <td>{{ $empleado->piso }}</td>
                        <td>{{ $empleado->departamento }}</td>
                        <td>{{ $empleado->seccion }}</td>
                        <td>{{ $empleado->extension }}</td>
                        <td>{{ $empleado->tipo_conexion }}</td>
                        <td>{{ $empleado->nodo }}</td>
                        <td>{{ $empleado->mac }}</td>
                        <td>{{ $empleado->sisipo }}</td>
                        @if(auth()->user()->canEdit())
                            <td>
                                <!-- Botón para editar -->
                                <a href="{{ route('empleados.edit', $empleado) }}" class="btn btn-warning btn-sm">Editar</a>

                                <!-- Formulario para eliminar -->
                                <form action="{{ route('empleados.destroy', $empleado) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Deseas eliminar este empleado?')">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ auth()->user()->canEdit() ? '14' : '13' }}" class="text-center text-muted">
                            No hay empleados registrados.
                            @if(auth()->user()->canEdit())
                                <a href="{{ route('empleados.create') }}">Crear el primero</a>
                            @endif
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <script>
    // Esperar 4 segundos (4000 ms) y luego ocultar las alertas
    setTimeout(() => {
        const alert = document.querySelector('.alert');
        if (alert) {
            // Usa el método de Bootstrap para ocultarlas con animación
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }
    }, 4000);
</script>
@endsection