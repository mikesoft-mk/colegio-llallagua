@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4 py-4 bg-light min-vh-screen">
    <header class="mb-4">
        <h1 class="h3 font-weight-bold text-dark">Asignación de Cursos</h1>
    </header>

    <!-- Alertas del Sistema (Éxito) -->
    @if (session('mensaje'))
    <div id="alerta-exito" class="alert alert-success border-0 shadow-sm mb-4">
        {{ session('mensaje') }}
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

    <!-- Alertas del Sistema (Errores / Duplicados) -->
    @if (session('error'))
        <div id="alert-danger" class="alert alert-danger border-0 shadow-sm mb-4">
            {{ session('error') }}
        </div>
        <script>
        setTimeout(function() {
            var alert = document.getElementById('alert-danger');
            if (alert) {
                alert.style.transition = "opacity 0.5s ease";
                alert.style.opacity = "0";
                setTimeout(function() { alert.remove(); }, 500); 
            }
        }, 500);
    </script>
    @endif

    

    @if ($errors->any())
        <div class="alert alert-danger border-0 shadow-sm mb-4">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Contenido de dos columnas -->
    <div class="row g-4">
        
        <!-- COLUMNA 1: Formulario de Asignación -->
        <div class="col-lg-5">
            <div class="card shadow-sm border-0 rounded-3 p-3 bg-white">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold text-dark mb-4">
                        Registrar una Nueva Asignación de curso
                    </h5>
                    
                    <form action="{{ route('director.asignaciones.guardar') }}" method="POST">
                        @csrf 

                        <!-- Selección de Profesor -->
                        <div class="mb-3">
                            <label class="form-label text-primary medium font-weight-bold mb-1">Profesor/a:   </label>
                            <select class="form-select bg-light border-0" name="id_profesor" required>
                                <option value="">-- Seleccionar Profesor --</option>
                                @foreach($profesores as $prof)
                                    <option value="{{ $prof->id }}" {{ old('id_profesor') == $prof->id ? 'selected' : '' }}>
                                        {{ $prof->name }} {{ $prof->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Selección de Curso / Grado -->
                        <div class="mb-4">
                            <label class="form-label text-primary medium font-weight-bold mb-1">Curso / Grado</label>
                            <select class="form-select bg-light border-0" name="id_curso" required>
                                <option value="">-- Seleccionar Curso --</option>
                                @foreach($cursos as $cur)
                                    <option value="{{ $cur->id }}" {{ old('id_curso') == $cur->id ? 'selected' : '' }}>
                                        {{ $cur->grado }}
                                    </option>
                                    
                                @endforeach
                                
                            </select>
                        </div>

                        <!-- Botón de Guardado -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary fw-bold py-2 shadow-sm rounded-3">
                                Guardar Asignación
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- COLUMNA 2: Listado de Asignaciones Actuales -->
        <div class="col-lg-6">
            <div class="card shadow-sm border-0 rounded-3 p-3 bg-white">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold text-dark mb-4">Nomina de Asignaciones Activas</h5>
                    
                    <div class="table-responsive">
                        <table class="table table-borderless align-middle mb-0">
                            <thead class="text-secondary medium">
                                <tr>
                                    <th>Profesor</th>
                                    <th>Curso Asignado</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($asignaciones) > 0)
                                    @foreach($asignaciones as $asig)
                                        <tr class="border-bottom" style="border-color: #9c9898 !important;">
                                            <!-- Datos del Profesor asignado -->
                                            <td class="py-3">
                                                <div class="fw-bold text-dark">{{ $asig->nom_profesor }} {{ $asig->ap_profesor }}</div>
                                                <div class="text-muted small fs-7">Tutor de Aula</div>
                                            </td>
                                            
                                            <!-- Grado Académico -->
                                            <td>
                                                <span class="badge bg-primary text-white px-3 py-2 rounded-2 fw-semibold">
                                                    {{ $asig->curso }}
                                                </span>
                                            </td>
                                            <td>
                                               <span class="badge text-xs medium {{ $asig->estados == 1 ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }} rounded-pill"> 
                                             {{ $asig->estados == 1 ? 'Activo' : 'Inactivo' }}
                                                                    </span>
                                            </td>
                                            <td class="text-end align-middle">
                                                <div class="d-inline-flex align-items-center gap-3 medium fw-bold">
                                                <!-- Enlace Editar -->
                                                <a href="" class="text-primary text-decoration-none">
                                                    Editar
                                                </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="2" class="text-center text-muted py-4">
                                            No hay asignaciones de cursos registradas todavía.
                                        </table>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
