@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Editar dispositivo de red</h1>

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

    <form action="{{ route('dispositivos_red.update', $dispositivos_red) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="tipo">Tipo</label>
            <select class="form-control" id="tipo" name="tipo">
                    <option value="">Seleccione un tipo</option>
                    <option value="Modem" {{ $dispositivos_red->tipo == '1' ? 'selected' : '' }}>Modem</option>
                    <option value="Router" {{ $dispositivos_red->tipo == '2' ? 'selected' : '' }}>Router</option>
                    <option value="Repetidor" {{ $dispositivos_red->tipo == '3' ? 'selected' : '' }}>Repetidor</option>
                    <option value="Switch" {{ $dispositivos_red->tipo == '4' ? 'selected' : '' }}>Switch</option>
                </select>
        </div>

        <div class="form-group mb-3">
            <label for="marca">Marca</label>
            <input type="text" name="marca" class="form-control" id="marca" value="{{ old('marca', $dispositivos_red->marca) }}" placeholder="Marca del dispositivo">
        </div>

        <div class="form-group mb-3">
            <label for="modelo">Modelo</label>
            <input type="text" name="modelo" class="form-control" id="modelo" value="{{ old('modelo', $dispositivos_red->modelo) }}" placeholder="Modelo">
        </div>

        <div class="form-group mb-3">
            <label for="numero_serie">Número de Serie</label>
            <input type="text" name="numero_serie" class="form-control" id="numero_serie" value="{{ old('numero_serie', $dispositivos_red->numero_serie) }}" placeholder="Número de serie">
        </div>

        <div class="form-group mb-3">
            <label for="direccion_ip">Dirección IP</label>
            <input type="text" name="direccion_ip" class="form-control" id="direccion_ip" value="{{ old('direccion_ip', $dispositivos_red->direccion_ip) }}" placeholder="Dirección IP">
        </div>

        <div class="form-group">
            <label for="nodo">Nodo</label>
            <input type="text" class="form-control" id="nodo" name="nodo" value="{{ old('nodo', $dispositivos_red->nodo) }}">
        </div>

        <div class="form-group">
            <label for="mac">Mac</label>
            <input type="text" class="form-control" id="mac" name="mac" value="{{ old('mac', $dispositivos_red->mac) }}">
        </div>

        <div class="form-group">
            <label for="sisipo">Sisipo</label>
            <input type="text" class="form-control" id="sisipo" name="sisipo" value="{{ old('sisipo', $dispositivos_red->sisipo) }}">
        </div>

        <div class="form-group mb-3">
            <label for="estado">Estado</label>
            <select name="estado" id="estado" class="form-control">
                <option value="Activo" {{ old('estado', $dispositivos_red->estado) == 'Activo' ? 'selected' : '' }}>Activo</option>
                <option value="Inactivo" {{ old('estado', $dispositivos_red->estado) == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                <option value="En reparación" {{ old('estado', $dispositivos_red->estado) == 'En reparación' ? 'selected' : '' }}>En reparación</option>
                <option value="Dado de baja" {{ old('estado', $dispositivos_red->estado) == 'Dado de baja' ? 'selected' : '' }}>Dado de baja</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="piso">Piso</label>
            <select class="form-control" id="piso" name="piso">
                    <option value="">Seleccione un piso</option>
                    <option value="1" {{ $dispositivos_red->piso == '1' ? 'selected' : '' }}>1</option>
                    <option value="2" {{ $dispositivos_red->piso == '2' ? 'selected' : '' }}>2</option>
                    <option value="3" {{ $dispositivos_red->piso == '3' ? 'selected' : '' }}>3</option>
                    <option value="4" {{ $dispositivos_red->piso == '4' ? 'selected' : '' }}>4</option>
                </select>
        </div>

        <div class="form-group mb-3">
            <label for="departamento">Departamento</label>
            <input type="text" name="departamento" class="form-control" id="departamento" value="{{ old('departamento', $dispositivos_red->departamento) }}" placeholder="Departamento">
        </div>

        <div class="form-group mb-3">
            <label for="seccion">Sección</label>
            <select class="form-control" id="seccion" name="seccion">
                    <option value="1D" {{ old('seccion', $dispositivos_red->seccion) == '1D' ? 'selected' : '' }}>1D</option>
                    <option value="1I" {{ old('seccion', $dispositivos_red->seccion) == '1I' ? 'selected' : '' }}>1I</option>
                    <option value="2D" {{ old('seccion', $dispositivos_red->seccion) == '2D' ? 'selected' : '' }}>2D</option>
                    <option value="2I" {{ old('seccion', $dispositivos_red->seccion) == '2I' ? 'selected' : '' }}>2I</option>
                    <option value="3D" {{ old('seccion', $dispositivos_red->seccion) == '3D' ? 'selected' : '' }}>3D</option>
                    <option value="3I" {{ old('seccion', $dispositivos_red->seccion) == '3I' ? 'selected' : '' }}>3I</option>
                </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar dispositivo</button>
        <a href="{{ route('dispositivos_red.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
