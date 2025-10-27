@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Editar Equipo</h1>

        <form action="{{ route('equipos.update', $equipo->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="tipo">Tipo</label>
                <select class="form-control" id="tipo" name="tipo" required>
                    <option value="">Seleccione un tipo</option>
                    <option value="Escritorio" {{ $equipo->tipo == 'Escritorio' ? 'selected' : '' }}>Escritorio</option>
                    <option value="Laptop" {{ $equipo->tipo == 'Laptop' ? 'selected' : '' }}>Laptop</option>
                    <option value="Tablet" {{ $equipo->tipo == 'Tablet' ? 'selected' : '' }}>Tablet</option>
                    <option value="Celular" {{ $equipo->tipo == 'Celular' ? 'selected' : '' }}>Celular</option>
                </select>
            </div>

            <div class="form-group">
                <label for="marca">Marca</label>
                <input type="text" class="form-control" id="marca" name="marca" value="{{ $equipo->marca }}" placeholder="Ej: HP, Dell, Lenovo">
            </div>

            <div class="form-group">
                <label for="modelo">Modelo</label>
                <input type="text" class="form-control" id="modelo" name="modelo" value="{{ $equipo->modelo }}">
            </div>

            <div class="form-group">
                <label for="numero_serie">Número de Serie</label>
                <input type="text" class="form-control" id="numero_serie" name="numero_serie" value="{{ $equipo->numero_serie }}">
            </div>

            <div class="form-group">
                <label for="direccion_ip">Dirección IP</label>
                <input type="text" class="form-control" id="direccion_ip" name="direccion_ip" value="{{ $equipo->direccion_ip }}" placeholder="Ej: 192.168.1.100">
            </div>

            <div class="form-group">
                <label for="estado">Estado</label>
                <select class="form-control" id="estado" name="estado">
                    <option value="">Seleccione un estado</option>
                    <option value="Activo" {{ $equipo->estado == 'Activo' ? 'selected' : '' }}>Activo</option>
                    <option value="Inactivo" {{ $equipo->estado == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                    <option value="En reparación" {{ $equipo->estado == 'En reparación' ? 'selected' : '' }}>En reparación</option>
                    <option value="Dado de baja" {{ $equipo->estado == 'Dado de baja' ? 'selected' : '' }}>Dado de baja</option>
                </select>
            </div>

            <div class="form-group">
                <label for="piso">Piso</label>
                <select class="form-control" id="piso" name="piso">
                    <option value="">Seleccione un piso</option>
                    <option value="1" {{ $equipo->piso == '1' ? 'selected' : '' }}>1</option>
                    <option value="2" {{ $equipo->piso == '2' ? 'selected' : '' }}>2</option>
                    <option value="3" {{ $equipo->piso == '3' ? 'selected' : '' }}>3</option>
                    <option value="4" {{ $equipo->piso == '4' ? 'selected' : '' }}>4</option>
                </select>
            </div>

            <div class="form-group">
                <label for="departamento">Departamento</label>
                <input type="text" class="form-control" id="departamento" name="departamento" value="{{ $equipo->departamento }}">
            </div>

            <div class="form-group">
                <label for="id_empleado">Empleado Asignado</label>
                <select class="form-control" id="id_empleado" name="id_empleado">
                    <option value="">Sin asignar</option>
                    @if(isset($empleados))
                        @foreach($empleados as $empleado)
                            <option value="{{ $empleado->id_empleado }}" {{ $equipo->id_empleado == $empleado->id_empleado ? 'selected' : '' }}>
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
                    <option value="AMD RYZEN" {{ $equipo->procesador == 'AMD RYZEN' ? 'selected' : '' }}>AMD RYZEN</option>
                    <option value="AMD RYZEN 3" {{ $equipo->procesador == 'AMD RYZEN 3' ? 'selected' : '' }}>AMD RYZEN 3</option>
                    <option value="AMD RYZEN 5" {{ $equipo->procesador == 'AMD RYZEN 5' ? 'selected' : '' }}>AMD RYZEN 5</option>
                    <option value="Intel Pentium" {{ $equipo->procesador == 'Intel Pentium' ? 'selected' : '' }}>Intel Pentium</option>
                    <option value="Intel Dual Core" {{ $equipo->procesador == 'Intel Dual Core' ? 'selected' : '' }}>Intel Dual Core</option>
                    <option value="Intel Celeron" {{ $equipo->procesador == 'Intel Celeron' ? 'selected' : '' }}>Intel Celeron</option>
                    <option value="Intel Core i3" {{ $equipo->procesador == 'Intel Core i3' ? 'selected' : '' }}>Intel Core i3</option>
                    <option value="Intel Core i5" {{ $equipo->procesador == 'Intel Core i5' ? 'selected' : '' }}>Intel Core i5</option>
                    <option value="Intel Core i7" {{ $equipo->procesador == 'Intel Core i7' ? 'selected' : '' }}>Intel Core i7</option>
                    <option value="Intel Core i9" {{ $equipo->procesador == 'Intel Core i9' ? 'selected' : '' }}>Intel Core i9</option>
                </select>
            </div>

            <div class="form-group">
                <label for="tecnologia_disco">Tecnología de Disco</label>
                <select class="form-control" id="tecnologia_disco" name="tecnologia_disco">
                    <option value="">Seleccione tecnología</option>
                    <option value="HDD" {{ $equipo->tecnologia_disco == 'HDD' ? 'selected' : '' }}>HDD</option>
                    <option value="SSD" {{ $equipo->tecnologia_disco == 'SSD' ? 'selected' : '' }}>SSD</option>
                    <option value="M2" {{ $equipo->tecnologia_disco == 'M2' ? 'selected' : '' }}>M2</option>
                </select>
            </div>

            <div class="form-group">
                <label for="tecnologia_memoria">Tecnología de Memoria</label>
                <select class="form-control" id="tecnologia_memoria" name="tecnologia_memoria">
                    <option value="">Seleccione tecnología</option>
                    <option value="DDR1" {{ $equipo->tecnologia_memoria == 'DDR1' ? 'selected' : '' }}>DDR1</option>
                    <option value="DDR2" {{ $equipo->tecnologia_memoria == 'DDR2' ? 'selected' : '' }}>DDR2</option>
                    <option value="DDR3" {{ $equipo->tecnologia_memoria == 'DDR3' ? 'selected' : '' }}>DDR3</option>
                    <option value="DDR4" {{ $equipo->tecnologia_memoria == 'DDR4' ? 'selected' : '' }}>DDR4</option>
                    <option value="DDR5" {{ $equipo->tecnologia_memoria == 'DDR5' ? 'selected' : '' }}>DDR5</option>
                    <option value="DDR6" {{ $equipo->tecnologia_memoria == 'DDR6' ? 'selected' : '' }}>DDR6</option>
                    <option value="DDR7" {{ $equipo->tecnologia_memoria == 'DDR7' ? 'selected' : '' }}>DDR7</option>
                </select>
            </div>

            <div class="form-group">
            <label for="tipo_conexion">Tipo Conexion</label>
            <select name="tipo_conexion" id="tipo_conexion" class="form-control">
                <option value="Alambrica" {{ old('tipo_conexion', $equipo->tipo_conexion) == 'Alambrica' ? 'selected' : '' }}>Alambrica</option>
                <option value="Inalambrica" {{ old('tipo_conexion', $equipo->tipo_conexion) == 'Inalambrica' ? 'selected' : '' }}>Inalambrica</option>
            </select>
        </div>

        <div class="form-group">
            <label for="nodo">Nodo</label>
            <input type="text" class="form-control" id="nodo" name="nodo" value="{{ old('nodo', $equipo->nodo) }}">
        </div>

        <div class="form-group">
            <label for="mac">Mac</label>
            <input type="text" class="form-control" id="mac" name="mac" value="{{ old('mac', $equipo->mac) }}">
        </div>

        <div class="form-group">
            <label for="sisipo">Sisipo</label>
            <input type="text" class="form-control" id="sisipo" name="sisipo" value="{{ old('sisipo', $equipo->sisipo) }}">
        </div>

            <button type="submit" class="btn btn-primary mt-3">Actualizar Equipo</button>
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