<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Estudiantes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BusquedaController extends Controller
{
    public function index(Request $request): View
    {
        $termino = trim((string) $request->input('q', ''));
        $usuario = $request->user()->loadMissing('rol', 'cursos');
        $esDirector = $usuario->rol?->nombre_rol === 'Director';

        $docentes = collect();
        $estudiantes = collect();
        $cursos = collect();

        if (mb_strlen($termino) >= 2) {
            $coincidencia = '%'.$termino.'%';
            $cursoIds = $usuario->cursos->pluck('id');

            $docentes = User::query()
                ->with('rol')
                ->whereHas('rol', fn ($query) => $query->where('nombre_rol', 'Profesor'))
                ->when(! $esDirector, fn ($query) => $query->whereKey($usuario->id))
                ->where(function ($query) use ($coincidencia) {
                    $query->where('name', 'like', $coincidencia)
                        ->orWhere('last_name', 'like', $coincidencia)
                        ->orWhere('ci_user', 'like', $coincidencia)
                        ->orWhere('user_name', 'like', $coincidencia);
                })
                ->orderBy('name')
                ->limit(10)
                ->get();

            $estudiantes = Estudiantes::query()
                ->with('curso')
                ->when(! $esDirector, fn ($query) => $query->whereIn('id_curso', $cursoIds))
                ->where(function ($query) use ($coincidencia) {
                    $query->where('apellidos_nombres', 'like', $coincidencia)
                        ->orWhere('ci_estudiante', 'like', $coincidencia);
                })
                ->orderBy('apellidos_nombres')
                ->limit(10)
                ->get();

            $cursos = Curso::query()
                ->when(! $esDirector, fn ($query) => $query->whereIn('id', $cursoIds))
                ->where('grado', 'like', $coincidencia)
                ->orderBy('grado')
                ->limit(10)
                ->get();
        }

        return view('busqueda.index', compact('termino', 'docentes', 'estudiantes', 'cursos'));
    }
}
