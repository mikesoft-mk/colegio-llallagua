<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Estudiantes;
use Illuminate\Support\Facades\Auth;

class ProfesorController extends Controller
{
    // 1. Muestra la pantalla del panel del profesor
    public function index(Request $request)
    {
        $id_profesor = Auth::id();

        // Buscamos los cursos asignados a este profesor mediante la tabla intermedia
        $cursos = Curso::whereHas('profesores', function ($query) use ($id_profesor) {
            $query->where('users.id', $id_profesor);
        })->get();

        $cursoSeleccionado = null;
        $estudiantes = collect();

        // Si el profesor hizo clic en un curso lateral, cargamos los alumnos
        if ($request->has('id_curso')) {
            $cursoSeleccionado = Curso::find($request->id_curso);
            if ($cursoSeleccionado) {
                $estudiantes = Estudiantes::where('id_curso', $cursoSeleccionado->id)->get();
            }
        }

        return view('profesor.panel', compact('cursos', 'cursoSeleccionado', 'estudiantes'));
    }

    // 2. Procesa la subida física del archivo PDF de la libreta
    public function subirLibreta(Request $request)
    {
        $request->validate([
            'id_estudiante' => 'required|exists:estudiantes,id',
            'id_curso' => 'required|exists:cursos,id',
            'trimestre' => 'required|in:1,2,3',
            'pdf_nota' => 'required|mimes:pdf|max:10000', 
        ]);

        $alumno = Estudiantes::find($request->id_estudiante);
        $trimestre = $request->trimestre;

        if ($request->hasFile('pdf_nota')) {
            $nombreArchivo = "Libretilla_" . $alumno->apellidos_nombres . "_" . $trimestre . "°_Trimestre".".pdf";
           
            
            // Se guarda en storage/app/public/libretillas/
            $request->file('pdf_nota')->move(public_path('libretillas'), $nombreArchivo);

            // Guardado dinámico en la columna correspondiente
            $columna = "pdf_trimestre" . $trimestre;
            $alumno->$columna = $nombreArchivo;
            $alumno->save();

            return back()->with('success', '¡Libreta del ' . $trimestre . '° Trimestre subida con éxito!');
        }

        return back()->with('error', 'No se pudo procesar el archivo PDF.');
    }
}
