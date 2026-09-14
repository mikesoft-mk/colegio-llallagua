@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4 py-4 bg-light min-vh-screen">
    <header class="mb-4">
        <h1 class="h3 font-weight-bold text-dark">Panel de Calificaciones Trimestrales</h1>
        <p class="text-muted small">Bienvenido Profesor(a): {{ Auth::user()->name }}</p>
    </header>

    <!-- Alertas del Sistema (Éxito) -->
    @if (session('success'))
    <div id="alerta-exito" class="alert alert-success border-0 shadow-sm mb-4">
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

    <div class="row g-4">
        <!-- COLUMNA 1: Listado de Cursos Asignados -->
        <div class="col-lg-3">
            <div class="card shadow-sm border-0 rounded-3 p-3 bg-white">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold text-dark mb-3">Mis Cursos</h5>
                    <div class="list-group list-group-flush">
                        @forelse($cursos as $cur)
                            <a href="{{ route('profesor.panel', ['id_curso' => $cur->id]) }}" 
                               class="list-group-item list-group-item-action border-0 rounded-2 mb-1 fw-bold text-secondary {{ isset($cursoSeleccionado) && $cursoSeleccionado->id == $cur->id ? 'bg-primary text-white' : 'bg-light' }}">
                                📁 {{ $cur->grado }}
                            </a>
                        @empty
                            <p class="text-muted small py-2">No tienes cursos asignados todavía.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- COLUMNA 2: Lista de Estudiantes y Formulario de Carga -->
        <div class="col-lg-9">
            @if($cursoSeleccionado)
                <div class="card shadow-sm border-0 rounded-3 p-3 bg-white">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold text-dark mb-4">Alumnos registrados para: <span class="text-primary">{{ $cursoSeleccionado->grado }}</span></h5>
                        
                        <div class="table-responsive">
                            <table class="table table-borderless align-middle mb-0">
                                <thead class="text-secondary medium">
                                    <tr>
                                        <th>Estudiante</th>
                                        <th class="text-center">Estado de Libretillas</th>
                                        <th class="text-end">Subir Libretilla (.PDF)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($estudiantes as $est)
                                        <tr class="border-bottom" style="border-color: #e2e8f0 !important;">
                                            <!-- Datos del Estudiante -->
                                            <td class="py-3">
                                                <div class="fw-bold text-dark">{{ $est->apellidos_nombres }}</div>
                                                <div class="text-muted small fs-7">C.I. {{ $est->ci_estudiante }}</div>
                                            </td>
                                            
                                            <!-- Indicadores de estado de trimestres (✅ / ❌) -->
                                            <td class="text-center medium">
                                                <span class="badge {{ $est->pdf_trimestre1 ? 'bg-success' : 'bg-light text-muted' }} me-1">1° Trimestre {{$est->pdf_trimestre1 ? '✅':'❌'}}</span>
                                                <span class="badge {{ $est->pdf_trimestre2 ? 'bg-success' : 'bg-light text-muted' }} me-1">2° Trimestre {{$est->pdf_trimestre2 ? '✅':'❌'}}</span>
                                                <span class="badge {{ $est->pdf_trimestre3 ? 'bg-success' : 'bg-light text-muted' }}">3° Trimestre {{$est->pdf_trimestre3 ? '✅':'❌'}}</span>
                                            </td>

                                            <!-- Formulario Inline de Subida -->
                                            <td class="text-end">
                                                <form action="{{ route('profesor.subir') }}" method="POST" enctype="multipart/form-data" class="d-inline-flex gap-2 justify-content-end align-items-center">
                                                    @csrf
                                                    <input type="hidden" name="id_estudiante" value="{{ $est->id }}">
                                                    <input type="hidden" name="id_curso" value="{{ $cursoSeleccionado->id }}">
                                                    
                                                    <select class="form-select form-select-sm bg-light border-0" name="trimestre" style="width: 130px;" required>
                                                        <option value="1">1er Trimestre</option>
                                                        <option value="2">2do Trimestre</option>
                                                        <option value="3">3er Trimestre</option>
                                                    </select>
                                                    
                                                    <input type="file" class="form-control form-control-sm bg-light border-0" name="pdf_nota" accept=".pdf" style="width: 180px;" required>
                                                    
                                                    <button type="submit" class="btn btn-primary fw-bold px-3 rounded-2 shadow-sm ms-3">
                                                        Subir Libretilla
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center text-muted py-4">No hay estudiantes en el sistema.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @else
                <div class="card shadow-sm border-0 rounded-3 p-5 bg-white text-center text-muted">
                    <div class="py-4">
                        <i class="h1 text-secondary">📂</i>
                        <h5 class="mt-3 font-weight-bold">Por favor, seleccione un curso del menú lateral para gestionar las libretas.</h5>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
