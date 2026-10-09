@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4 py-4 bg-light min-vh-screen">
    <header class="mb-4">
        <h1 class="h3 font-weight-bold text-dark">Gestión de Usuarios</h1>
    </header>

    <!-- Alertas del Sistema (Éxito) -->
     <!--@if (session('success'))
        <div class="alert alert-success border-0 shadow-sm mb-4">
            {{ session('success') }}
        </div>
    @endif-->

    @if (session('success'))
    <div id="alerta-exito" class="alert alert-success">
        {{ session('success') }}
    </div>
    <script>
        setTimeout(function() {
            var alerta = document.getElementById('alerta-exito');
            if (alerta) {
                alerta.style.transition = "opacity 0.5s ease";
                alerta.style.opacity = "0";
                setTimeout(function() { alerta.remove(); }, 500); 
            }
        }, 4000);
    </script>
@endif

    <!-- Errores-->
    @if ($errors->any())
        <div class="alert alert-danger border-0 shadow-sm mb-4">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- 2 contente-->
    <div class="row g-4">
        
        <!-- CONT1-->
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 rounded-3 p-3 bg-white">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold text-dark mb-4">
                        {{ isset($userToEdit) ? 'Modificación de Profesor' : 'Registro de Profesores' }}
                    </h5>
                    
                    <!-- Form para Guardar o Actualizar -->
                    <form action="{{ isset($userToEdit) ? route('profesores.actualizar', $userToEdit->id) : route('profesores.guardar') }}" method="POST">
                        
                        @csrf 
                        @if(isset($userToEdit))
                            @method('PUT')
                        @endif

                        
                        <div class="mb-3">
                            <label class="form-label text-primary small font-weight-bold mb-1">Nombre</label>
                            <input type="text" class="form-control bg-light border-0" name="name" value="{{ old('name', $userToEdit->name ?? '') }}" required>
                        </div>

                       
                        <div class="mb-3">
                            <label class="form-label text-primary small font-weight-bold mb-1">Apellido</label>
                            <input type="text" class="form-control bg-light border-0" name="last_name" value="{{ old('last_name', $userToEdit->last_name ?? '') }}" required>
                        </div>

                        
                        <div class="mb-3">
                            <label class="form-label text-primary small font-weight-bold mb-1">Carnet de Identidad</label>
                            <input type="text" class="form-control bg-light border-0" name="ci_user" value="{{ old('ci_user', $userToEdit->ci_user ?? '') }}" required>
                        </div>

                        
                        <div class="mb-3">
                            <label class="form-label text-primary small font-weight-bold mb-1">Correo Electrónico</label>
                            <input type="email" class="form-control bg-light border-0" name="email" value="{{ old('email', $userToEdit->email ?? '') }}" required>
                        </div>
                        

                        
                        <div class="mb-3">
                            <label class="form-label text-primary small font-weight-bold mb-1">Rol</label>
                            <select class="form-select bg-light border-0" name="id_rol" required>
                                @foreach ($roles as $rol)
                                    <option value="{{ $rol->id }}" {{ (int) old('id_rol', $userToEdit->id_rol ?? 0) === $rol->id ? 'selected' : '' }}>
                                        {{ $rol->nombre_rol }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                       
                        <div class="mb-3">
                            <label class="form-label text-primary small font-weight-bold mb-1">Contraseña</label>
                            <input type="password" class="form-control bg-light border-0" name="password" {{ isset($userToEdit) ? '' : 'required' }}>
                            @if(isset($userToEdit))
                                <div class="form-text text-muted small">Deja el espacio en blanco si no quieres cambiarla.</div>
                            @endif
                        </div>

                        
                        <div class="mb-4">
                            <label class="form-label text-primary small font-weight-bold mb-1">Estado de Profesor</label>
                            <select class="form-select bg-light border-0" name="estado_activo" required>
                                <option value="1" {{ (int) old('estado_activo', $userToEdit->estado_activo ?? 1) === 1 ? 'selected' : '' }}>Activo</option>
                                <option value="0" {{ (int) old('estado_activo', $userToEdit->estado_activo ?? 1) === 0 ? 'selected' : '' }}>Inactivo</option>
                            </select>
                        </div>

                        <!-- Botón  -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary fw-bold py-2 shadow-sm rounded-3">
                                {{ isset($userToEdit) ? 'Actualizar Usuario' : 'Guardar Usuario' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- CONT2 -->
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 rounded-3 p-3 bg-white">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold text-dark mb-4">Listado de Profesores</h5>
                    
                    <div class="table-responsive">
                        <table class="table table-borderless align-middle mb-0">
                            <thead class="text-secondary medium">
                                <tr>
                                    <th>Usuario</th>
                                    <th>Rol</th>
                                    <th>Estado</th>
                                    <th class="text-end">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($users) && $users->count() > 0)
                                    @foreach($users as $user)
                                        <tr class="border-bottom" style="border-color: #9c9898 !important;">
                                            <!-- Datos del Profesor (Nombre completo y CI abajo) -->
                                            <td class="py-3">
                                                <div class="fw-bold text-dark">{{ $user->name }} {{ $user->last_name }}</div>
                                                <div class="text-muted small fs-7">C.I. {{ $user->ci_user }}</div>
                                            </td>
                                            
                                            <!-- Rol con estilos -->
                                            <td>
                                                <span class="text-primary fw-semibold medium">{{ $user->rol?->nombre_rol ?? 'Sin asignar' }}</span>
                                            </td>
                                            
                                            
                                            <!-- Estado con color dinámico -->
                                            <td>
                                               <span class="badge text-xs medium {{ $user->estado_activo == 1 ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }} rounded-pill"> 
                                             {{ $user->estado_activo == 1 ? 'Activo' : 'Inactivo' }}
                                                                    </span>
                                            </td>
                                            
                                            <!-- Acciones: Editar y Eliminar -->
                                            <td class="text-end align-middle">
                                                <div class="d-inline-flex align-items-center gap-3 medium fw-bold">
                                                <!-- Enlace Editar -->
                                                <a href="{{ route('profesores.vista', ['edit' => $user->id]) }}" class="text-primary text-decoration-none">
                                                    Editar
                                                </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                 <!-- Mensaje corregido dentro de una fila válida de la tabla -->
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">
                                    No hay registros en el sistema.
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div> <!-- Cierre de table-responsive -->
            
        </div> <!-- Cierre de card-body -->
    </div> <!-- Cierre de card -->
</div> <!-- Cierre de col-lg-8 -->
@endsection


