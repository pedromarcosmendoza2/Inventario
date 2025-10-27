@extends('layouts.app')

@section('content')
<div class="container my-4">
    <h2 class="fw-bold mb-4">Editar Usuario</h2>

    <div class="card shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Nombre Completo</label>
                    <input 
                        type="text" 
                        class="form-control @error('name') is-invalid @enderror" 
                        id="name" 
                        name="name" 
                        value="{{ old('name', $user->name) }}" 
                        required
                    >
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Correo Electrónico</label>
                    <input 
                        type="email" 
                        class="form-control @error('email') is-invalid @enderror" 
                        id="email" 
                        name="email" 
                        value="{{ old('email', $user->email) }}" 
                        required
                    >
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="role" class="form-label fw-semibold">Rol</label>
                    <select 
                        class="form-select @error('role') is-invalid @enderror" 
                        id="role" 
                        name="role" 
                        required
                    >
                        <option value="viewer" {{ old('role', $user->role) === 'viewer' ? 'selected' : '' }}>
                            Viewer (Solo lectura)
                        </option>
                        <option value="editor" {{ old('role', $user->role) === 'editor' ? 'selected' : '' }}>
                            Editor (Puede editar y eliminar)
                        </option>
                        <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>
                            Administrador (Control total)
                        </option>
                    </select>
                    @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">
                        <strong>Viewer:</strong> Solo puede ver información<br>
                        <strong>Editor:</strong> Puede crear, editar y eliminar registros<br>
                        <strong>Admin:</strong> Control total + gestión de usuarios
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection