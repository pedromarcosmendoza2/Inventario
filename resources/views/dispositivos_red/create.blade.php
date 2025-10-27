@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Crear nuevo dispositivo de red</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Ups!</strong> Hay algunos problemas con los datos ingresados.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dispositivos_red.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="tipo">Tipo</label>
            <select class="form-control" id="tipo" name="tipo" required>
                    <option value="">Seleccione un Tipo</option>
                    <option value="Modem">Modem</option>
                    <option value="Router">Router</option>
                    <option value="Repetidor">Repetidor</option>
                    <option value="Switch">Switch</option>
                </select>
        </div>

        <div class="form-group mb-3">
            <label for="marca">Marca</label>
            <input type="text" name="marca" class="form-control" id="marca" value="{{ old('marca') }}" placeholder="Marca del dispositivo">
        </div>

        <div class="form-group mb-3">
            <label for="modelo">Modelo</label>
            <input type="text" name="modelo" class="form-control" id="modelo" value="{{ old('modelo') }}" placeholder="Modelo">
        </div>

        <div class="form-group mb-3">
            <label for="numero_serie">Número de Serie</label>
            <input type="text" name="numero_serie" class="form-control" id="numero_serie" value="{{ old('numero_serie') }}" placeholder="Número de serie">
        </div>

        <div class="form-group mb-3">
            <label for="direccion_ip">Dirección IP</label>
            <input type="text" name="direccion_ip" class="form-control" id="direccion_ip" value="{{ old('direccion_ip') }}" placeholder="Dirección IP">
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
        
        <div class="form-group mb-3">
            <label for="estado">Estado</label>
            <select name="estado" id="estado" class="form-control">
                <option value="Activo" {{ old('estado') == 'Activo' ? 'selected' : '' }}>Activo</option>
                <option value="Inactivo" {{ old('estado') == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                <option value="En reparación" {{ old('estado') == 'En reparación' ? 'selected' : '' }}>En reparación</option>
                <option value="Dado de baja" {{ old('estado') == 'Dado de baja' ? 'selected' : '' }}>Dado de baja</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="piso">Piso</label>
            <select class="form-control" id="piso" name="piso" required>
                    <option value="">Seleccione un piso</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
        </div>

        <div class="form-group mb-3">
            <label for="departamento">Departamento</label>
            <input type="text" name="departamento" class="form-control" id="departamento" value="{{ old('departamento') }}" placeholder="Departamento">
        </div>

        <div class="form-group mb-3">
            <label for="seccion">Sección</label>
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

        <button type="submit" class="btn btn-primary">Guardar dispositivo</button>
        <a href="{{ route('dispositivos_red.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
