@extends('layouts.admin')

@section('title', 'Resultados de búsqueda')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div>
                <h1 class="h3 mb-1 text-gray-800">Resultados de búsqueda</h1>
                @if ($termino === '')
                    <p class="mb-0 text-muted">Escribe al menos dos caracteres para buscar.</p>
                @elseif (mb_strlen($termino) < 2)
                    <p class="mb-0 text-muted">Escribe al menos dos caracteres para buscar “{{ $termino }}”.</p>
                @else
                    <p class="mb-0 text-muted">Resultados para “{{ $termino }}”.</p>
                @endif
            </div>
        </div>

        @if (mb_strlen($termino) >= 2)
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="card shadow h-100">
                        <div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Docentes</h6></div>
                        <div class="card-body">
                            @forelse ($docentes as $docente)
                                <div class="mb-3 border-bottom pb-2">
                                    <div class="font-weight-bold">{{ $docente->name }} {{ $docente->last_name }}</div>
                                    <div class="small text-muted">Usuario: {{ $docente->user_name ?: 'Sin asignar' }}</div>
                                    <div class="small text-muted">C.I.: {{ $docente->ci_user ?: 'Sin asignar' }}</div>
                                    <span class="badge badge-{{ $docente->estado_activo ? 'success' : 'secondary' }}">{{ $docente->estado_activo ? 'Activo' : 'Inactivo' }}</span>
                                </div>
                            @empty
                                <p class="text-muted mb-0">No se encontraron docentes.</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="card shadow h-100">
                        <div class="card-header py-3"><h6 class="m-0 font-weight-bold text-success">Estudiantes</h6></div>
                        <div class="card-body">
                            @forelse ($estudiantes as $estudiante)
                                <div class="mb-3 border-bottom pb-2">
                                    <div class="font-weight-bold">{{ $estudiante->apellidos_nombres }}</div>
                                    <div class="small text-muted">C.I.: {{ $estudiante->ci_estudiante }}</div>
                                    <div class="small text-muted">Curso: {{ $estudiante->curso?->grado ?? 'Sin curso' }}</div>
                                    <span class="badge badge-{{ $estudiante->estado_activo ? 'success' : 'secondary' }}">{{ $estudiante->estado_activo ? 'Activo' : 'Inactivo' }}</span>
                                </div>
                            @empty
                                <p class="text-muted mb-0">No se encontraron estudiantes.</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="card shadow h-100">
                        <div class="card-header py-3"><h6 class="m-0 font-weight-bold text-info">Cursos</h6></div>
                        <div class="card-body">
                            @forelse ($cursos as $curso)
                                <div class="mb-3 border-bottom pb-2">
                                    <div class="font-weight-bold">{{ $curso->grado }}</div>
                                </div>
                            @empty
                                <p class="text-muted mb-0">No se encontraron cursos.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
