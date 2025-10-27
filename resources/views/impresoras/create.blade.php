@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Crear Nueva Impresora</h1>

    <form action="{{ route('impresoras.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="marca">Marca</label>
            <select class="form-control" id="marca" name="marca" required>
                    <option value="">Seleccione una marca</option>
                    <option value="SHARP">SHARP</option>
                    <option value="EPSON">EPSON</option>
                    <option value="CANON">CANON</option>
                    <option value="HP">HP</option>
                    <option value="BROTHER">BROTHER</option>
                </select>
        </div>

        <div class="form-group">
            <label for="modelo">Modelo</label>
            <input type="text" class="form-control" id="modelo" name="modelo">
        </div>

        <div class="form-group">
            <label for="numero_serie">Número de Serie</label>
            <input type="text" class="form-control" id="numero_serie" name="numero_serie" value="{{ old('numero_serie') }}">
        </div>

        <div class="form-group">
            <label for="direccion_ip">Dirección IP</label>
            <input type="text" class="form-control" id="direccion_ip" name="direccion_ip" placeholder="Ej: 192.168.1.100" value="{{ old('direccion_ip') }}">
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

        <div class="form-group">
            <label for="estado">Estado</label>
            <select class="form-control" id="estado" name="estado">
                <option value="">Seleccione un estado</option>
                <option value="Activo" {{ old('estado') == 'Activo' ? 'selected' : '' }}>Activo</option>
                <option value="Inactivo" {{ old('estado') == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                <option value="En reparación" {{ old('estado') == 'En reparación' ? 'selected' : '' }}>En reparación</option>
                <option value="Dado de baja" {{ old('estado') == 'Dado de baja' ? 'selected' : '' }}>Dado de baja</option>
            </select>
        </div>

        <div class="form-group">
            <label for="piso">Piso</label>
            <select class="form-control" id="piso" name="piso">
                <option value="">Seleccione un piso</option>
                <option value="1" {{ old('piso') == '1' ? 'selected' : '' }}>1</option>
                <option value="2" {{ old('piso') == '2' ? 'selected' : '' }}>2</option>
                <option value="3" {{ old('piso') == '3' ? 'selected' : '' }}>3</option>
                <option value="4" {{ old('piso') == '4' ? 'selected' : '' }}>4</option>
            </select>
        </div>

        <div class="form-group">
            <label for="departamento">Departamento</label>
            <input type="text" class="form-control" id="departamento" name="departamento" value="{{ old('departamento') }}">
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

        <button type="submit" class="btn btn-primary mt-3">Guardar Impresora</button>
        <a href="{{ route('impresoras.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>

    @if ($errors->any())
    <div class="alert alert-danger mt-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
@endsection
