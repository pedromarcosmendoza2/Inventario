@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Crear Nuevo Empleado</h1>

        <form action="{{ route('empleados.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="form-group">
                <label for="apellido_paterno">Apellido Paterno</label>
                <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno">
            </div>

            <div class="form-group">
                <label for="apellido_materno">Apellido Materno</label>
                <input type="text" class="form-control" id="apellido_materno" name="apellido_materno">
            </div>

            <div class="form-group">
                <label for="cargo">Cargo</label>
                <input type="text" class="form-control" id="cargo" name="cargo">
            </div>

            <div class="form-group">
                <label for="departamento">Departamento</label>
                <input type="text" class="form-control" id="departamento" name="departamento">
            </div>

            <div class="form-group">
                <label for="piso">Piso</label>
                <select class="form-control" id="piso" name="piso" required>
                    <option value="">Seleccione un piso</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>

            <div class="form-group">
                <label for="seccion">Seccion</label>
                <select class="form-control" id="seccion" name="seccion" required>
                    <option value="">Seleccione una sección</option>
                    <option value="1D">1D</option>
                    <option value="1I">1I</option>
                    <option value="2D">2D</option>
                    <option value="2I">2I</option>
                    <option value="3D">3D</option>
                    <option value="3I">3I</option>
                </select>
            </div>

            <div class="form-group">
                <label for="extension">Extension</label>
                <input type="text" class="form-control" id="extension" name="extension">
            </div>

            <div class="form-group">
                <label for="tipo_conexion">Tipo Conexion</label>
                <select class="form-control" id="tipo_conexion" name="tipo_conexion" required>
                    <option value="">Seleccione un tipo de conexion</option>
                    <option value="Alambrica">Alambrica</option>
                    <option value="Inalambrica">Inalambrica</option>
                </select>
            </div>

            <div class="form-group">
                <label for="nodo">Nodo</label>
                <input type="text" class="form-control" id="nodo" name="nodo">
            </div>

            <div class="form-group">
                <label for="mac">Mac</label>
                <input type="text" class="form-control" id="mac" name="mac">
            </div>

            <div class="form-group">
                <label for="sisipo">Sisipo</label>
                <input type="text" class="form-control" id="sisipo" name="sisipo">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Guardar</button>
            <a href="{{ route('empleados.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
        </form>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>
    
@endsection