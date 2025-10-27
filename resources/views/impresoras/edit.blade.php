@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Editar Impresora</h1>

        <form action="{{ route('impresoras.update', $impresora->id_impresora) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="marca">Marca</label>
                <select class="form-control" id="marca" name="marca">
                    <option value="SHARP" {{ old('marca', $impresora->marca) == 'SHARP' ? 'selected' : '' }}>SHARP</option>
                    <option value="EPSON" {{ old('marca', $impresora->marca) == 'EPSON' ? 'selected' : '' }}>EPSON</option>
                    <option value="CANON" {{ old('marca', $impresora->marca) == 'CANON' ? 'selected' : '' }}>CANON</option>
                    <option value="HP" {{ old('marca', $impresora->marca) == 'HP' ? 'selected' : '' }}>HP</option>
                    <option value="BROTHER" {{ old('marca', $impresora->marca) == 'BROTHER' ? 'selected' : '' }}>BROTHER</option>
                </select>
            </div>

            <div class="form-group">
                <label for="modelo">Modelo</label>
                <input type="text" class="form-control" id="modelo" name="modelo" value="{{ old('modelo', $impresora->modelo) }}" required>
            </div>

            <div class="form-group">
                <label for="numero_serie">Número de Serie</label>
                <input type="text" class="form-control" id="numero_serie" name="numero_serie" value="{{ old('numero_serie', $impresora->numero_serie) }}">
            </div>

            <div class="form-group">
                <label for="direccion_ip">Dirección IP</label>
                <input type="text" class="form-control" id="direccion_ip" name="direccion_ip" value="{{ old('direccion_ip', $impresora->direccion_ip) }}">
            </div>

            <div class="form-group">
            <label for="nodo">Nodo</label>
            <input type="text" class="form-control" id="nodo" name="nodo" value="{{ old('nodo', $impresora->nodo) }}">
            </div>

            <div class="form-group">
            <label for="mac">Mac</label>
            <input type="text" class="form-control" id="mac" name="mac" value="{{ old('mac', $impresora->mac) }}">
            </div>

            <div class="form-group">
            <label for="sisipo">Sisipo</label>
            <input type="text" class="form-control" id="sisipo" name="sisipo" value="{{ old('sisipo', $impresora->sisipo) }}">
            </div>

            <div class="form-group">
                <label for="estado">Estado</label>
                <select class="form-control" id="estado" name="estado">
                    <option value="Activo" {{ old('estado', $impresora->estado) == 'Activo' ? 'selected' : '' }}>Activo</option>
                    <option value="Inactivo" {{ old('estado', $impresora->estado) == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                    <option value="En reparación" {{ old('estado', $impresora->estado) == 'En reparación' ? 'selected' : '' }}>En reparación</option>
                    <option value="Dado de baja" {{ old('estado', $impresora->estado) == 'Dado de baja' ? 'selected' : '' }}>Dado de baja</option>
                </select>
            </div>

            <div class="form-group">
                <label for="piso">Piso</label>
                <select class="form-control" id="piso" name="piso">
                    <option value="1" {{ old('piso', $impresora->piso) == '1' ? 'selected' : '' }}>1</option>
                    <option value="2" {{ old('piso', $impresora->piso) == '2' ? 'selected' : '' }}>2</option>
                    <option value="3" {{ old('piso', $impresora->piso) == '3' ? 'selected' : '' }}>3</option>
                    <option value="4" {{ old('piso', $impresora->piso) == '4' ? 'selected' : '' }}>4</option>
                </select>
            </div>

            <div class="form-group">
                <label for="departamento">Departamento</label>
                <input type="text" class="form-control" id="departamento" name="departamento" value="{{ old('departamento', $impresora->departamento) }}">
            </div>

            <div class="form-group">
                <label for="seccion">Sección</label>
                <select class="form-control" id="seccion" name="seccion">
                    <option value="1D" {{ old('seccion', $impresora->seccion) == '1D' ? 'selected' : '' }}>1D</option>
                    <option value="1I" {{ old('seccion', $impresora->seccion) == '1I' ? 'selected' : '' }}>1I</option>
                    <option value="2D" {{ old('seccion', $impresora->seccion) == '2D' ? 'selected' : '' }}>2D</option>
                    <option value="2I" {{ old('seccion', $impresora->seccion) == '2I' ? 'selected' : '' }}>2I</option>
                    <option value="3D" {{ old('seccion', $impresora->seccion) == '3D' ? 'selected' : '' }}>3D</option>
                    <option value="3I" {{ old('seccion', $impresora->seccion) == '3I' ? 'selected' : '' }}>3I</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
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
