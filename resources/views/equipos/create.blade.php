@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Crear Nuevo Equipo</h1>

        <form action="{{ route('equipos.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="tipo">Tipo</label>
                <select class="form-control" id="tipo" name="tipo" required>
                    <option value="">Seleccione un tipo</option>
                    <option value="Escritorio">Escritorio</option>
                    <option value="Laptop">Laptop</option>
                    <option value="Tablet">Tablet</option>
                    <option value="Celular">Celular</option>
                </select>
            </div>

            <div class="form-group">
                <label for="marca">Marca</label>
                <input type="text" class="form-control" id="marca" name="marca" placeholder="Ej: HP, Dell, Lenovo">
            </div>

            <div class="form-group">
                <label for="modelo">Modelo</label>
                <input type="text" class="form-control" id="modelo" name="modelo">
            </div>

            <div class="form-group">
                <label for="numero_serie">Número de Serie</label>
                <input type="text" class="form-control" id="numero_serie" name="numero_serie">
            </div>

            <div class="form-group">
                <label for="direccion_ip">Dirección IP</label>
                <input type="text" class="form-control" id="direccion_ip" name="direccion_ip" placeholder="Ej: 192.168.1.100">
            </div>

            <div class="form-group">
                <label for="estado">Estado</label>
                <select class="form-control" id="estado" name="estado">
                    <option value="">Seleccione un estado</option>
                    <option value="Activo" selected>Activo</option>
                    <option value="Inactivo">Inactivo</option>
                    <option value="En reparación">En reparación</option>
                    <option value="Dado de baja">Dado de baja</option>
                </select>
            </div>

            <div class="form-group">
                <label for="piso">Piso</label>
                <select class="form-control" id="piso" name="piso">
                    <option value="">Seleccione un piso</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>

            <div class="form-group">
                <label for="departamento">Departamento</label>
                <input type="text" class="form-control" id="departamento" name="departamento">
            </div>

            <div class="form-group">
                <label for="id_empleado">Empleado Asignado</label>
                <select class="form-control" id="id_empleado" name="id_empleado">
                    <option value="">Sin asignar</option>
                    @if(isset($empleados))
                        @foreach($empleados as $empleado)
                            <option value="{{ $empleado->id_empleado }}">
                                {{ $empleado->nombre }} {{ $empleado->apellido_paterno }} {{ $empleado->apellido_materno }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="form-group">
                <label for="procesador">Procesador</label>
                <select class="form-control" id="procesador" name="procesador">
                    <option value="">Seleccione Procesador</option>
                    <option value="AMD RYZEN">AMD RYZEN</option>
                    <option value="AMD RYZEN 3">AMD RYZEN 3</option>
                    <option value="AMD RYZEN 5">AMD RYZEN 5</option>
                    <option value="Intel Pentium">Intel Pentium</option>
                    <option value="Intel Dual Core">Intel Dual Core</option>
                    <option value="Intel Celeron">Intel Celeron</option>
                    <option value="Intel Core i3">Intel Core i3</option>
                    <option value="Intel Core i5">Intel Core i5</option>
                    <option value="Intel Core i7">Intel Core i7</option>
                    <option value="Intel Core i9">Intel Core i9</option>
                </select>
            </div>

            <div class="form-group">
                <label for="tecnologia_disco">Tecnología de Disco</label>
                <select class="form-control" id="tecnologia_disco" name="tecnologia_disco">
                    <option value="">Seleccione tecnología</option>
                    <option value="HDD">HDD</option>
                    <option value="SSD">SSD</option>
                    <option value="M2">M2</option>
                </select>
            </div>

            <div class="form-group">
                <label for="tecnologia_memoria">Tecnología de Memoria</label>
                <select class="form-control" id="tecnologia_memoria" name="tecnologia_memoria">
                    <option value="">Seleccione tecnología</option>
                    <option value="DDR1">DDR1</option>
                    <option value="DDR2">DDR2</option>
                    <option value="DDR3">DDR3</option>
                    <option value="DDR4">DDR4</option>
                    <option value="DDR5">DDR5</option>
                    <option value="DDR6">DDR6</option>
                    <option value="DDR7">DDR7</option>
                </select>
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

            <button type="submit" class="btn btn-primary mt-3">Guardar Equipo</button>
            <a href="{{ route('equipos.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
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