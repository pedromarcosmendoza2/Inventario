@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Editar Empleado</h1>

    <form action="{{ route('empleados.update', $empleado->id_empleado) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre">Nombre <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $empleado->nombre) }}" required>
        </div>

        <div class="form-group">
            <label for="apellido_paterno">Apellido Paterno</label>
            <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" value="{{ old('apellido_paterno', $empleado->apellido_paterno) }}">
        </div>

        <div class="form-group">
            <label for="apellido_materno">Apellido Materno</label>
            <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" value="{{ old('apellido_materno', $empleado->apellido_materno) }}">
        </div>

        <div class="form-group">
            <label for="cargo">Cargo</label>
            <input type="text" class="form-control" id="cargo" name="cargo" value="{{ old('cargo', $empleado->cargo) }}">
        </div>

        <div class="form-group">
            <label for="piso">Piso</label>
            <select class="form-control" id="piso" name="piso">
                <option value="">Seleccione un piso</option>
                @for ($i = 1; $i <= 4; $i++)
                    <option value="{{ $i }}" {{ (old('piso', $empleado->piso) == $i) ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
        </div>

        <div class="form-group">
            <label for="departamento">Departamento</label>
            <input type="text" class="form-control" id="departamento" name="departamento" value="{{ old('departamento', $empleado->departamento) }}">
        </div>

        <div class="form-group">
            <label for="seccion">Sección</label>
            <input type="text" class="form-control" id="seccion" name="seccion" value="{{ old('seccion', $empleado->seccion) }}">
        </div>

        <div class="form-group">
            <label for="extension">Extensión</label>
            <input type="text" class="form-control" id="extension" name="extension" value="{{ old('extension', $empleado->extension) }}">
        </div>

        <div class="form-group">
            <label for="tipo_conexion">Tipo Conexion</label>
            <select name="tipo_conexion" id="tipo_conexion" class="form-control">
                <option value="Alambrica" {{ old('tipo_conexion', $empleado->tipo_conexion) == 'Alambrica' ? 'selected' : '' }}>Alambrica</option>
                <option value="Inalambrica" {{ old('tipo_conexion', $empleado->tipo_conexion) == 'Inalambrica' ? 'selected' : '' }}>Inalambrica</option>
            </select>
        </div>

        <div class="form-group">
            <label for="nodo">Nodo</label>
            <input type="text" class="form-control" id="nodo" name="nodo" value="{{ old('nodo', $empleado->nodo) }}">
        </div>

        <div class="form-group">
            <label for="mac">Mac</label>
            <input type="text" class="form-control" id="mac" name="mac" value="{{ old('mac', $empleado->mac) }}">
        </div>

        <div class="form-group">
            <label for="sisipo">Sisipo</label>
            <input type="text" class="form-control" id="sisipo" name="sisipo" value="{{ old('sisipo', $empleado->sisipo) }}">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Actualizar Empleado</button>
        <a href="{{ route('empleados.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
@endsection
