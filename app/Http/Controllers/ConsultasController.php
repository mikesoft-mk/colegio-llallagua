<?php

namespace App\Http\Controllers;
use App\Models\Curso;
use Illuminate\Http\Request;
use App\Models\Estudiantes; // Buscaremos en tu tabla exclusiva

class ConsultasController extends Controller
{
    // 1. Muestra la pantalla inicial con el formulario vacío
    public function index()
    {
       
        return view('consultas.libretillas');
    }

    // 2. Procesa la búsqueda por CI y Fecha de Nacimiento
    public function buscar(Request $request)
    {
        // Validamos los campos de entrada
        $request->validate([
            'ci_estudiante' => 'required|string',
            'fecha_nacimiento' => 'required|date',
        ]);

        // Tu lógica original: Buscar al estudiante que coincida con ambos campos
        $estudiante = Estudiantes::where('ci_estudiante', $request->ci_estudiante)
            ->where('fecha_nacimiento', $request->fecha_nacimiento)
            ->first();
        
        
        // Si no existe, regresamos con el mensaje de error original
        if (!$estudiante) {
            return back()->withInput()->with('error', 'Los datos ingresados no coinciden con ningún estudiante, Verifique por favor!.');
        }

        // Tu lógica original: Verificar si de verdad tiene al menos una libreta disponible
       /* if (empty($estudiante->pdf_trimestre1) && empty($estudiante->pdf_trimestre2) && empty($estudiante->pdf_trimestre3)) {
            return back()->withInput()->with('error', 'Estudiante encontrado, pero aún no se han subido calificaciones para ningún trimestre.');
        }*/

        // Si todo está correcto, recargamos la vista enviando los datos del alumno encontrado
        return view('consultas.libretillas', compact('estudiante'));
    }
}
