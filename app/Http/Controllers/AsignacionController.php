<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\User;
use App\Notifications\CursoAsignado;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AsignacionController extends Controller
{
    public function index(): View
    {
        $profesores = User::query()
            ->whereHas('rol', fn ($query) => $query->where('nombre_rol', 'Profesor'))
            ->orderBy('name')
            ->get();
        $cursos = Curso::orderBy('grado')->get();
        $asignaciones = DB::table('asignaciones')
            ->join('users', 'asignaciones.id_profesor', '=', 'users.id')
            ->join('cursos', 'asignaciones.id_curso', '=', 'cursos.id')
            ->select('users.name as nom_profesor', 'users.last_name as ap_profesor', 'cursos.grado as curso', 'asignaciones.estado as estados')
            ->orderBy('cursos.grado')
            ->get();

        return view('director.asignaciones', compact('profesores', 'cursos', 'asignaciones'));
    }

    public function guardar(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'id_profesor' => 'required|exists:users,id',
            'id_curso' => 'required|exists:cursos,id',
        ]);

        $profesor = User::with('rol')->findOrFail($data['id_profesor']);
        $curso = Curso::findOrFail($data['id_curso']);

        if ($profesor->rol?->nombre_rol !== 'Profesor') {
            return back()->with('error', 'Solo se pueden asignar cursos a usuarios con rol de Profesor.');
        }

        $existe = DB::table('asignaciones')
            ->where('id_profesor', $profesor->id)
            ->where('id_curso', $curso->id)
            ->exists();

        if ($existe) {
            return back()->with('error', 'Este profesor ya está asignado a ese curso.');
        }

        DB::table('asignaciones')->insert([
            'id_profesor' => $profesor->id,
            'id_curso' => $curso->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $profesor->notify(new CursoAsignado($curso));

        return back()->with('mensaje', 'Asignación guardada y notificación enviada al docente.');
    }
}
