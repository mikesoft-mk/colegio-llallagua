<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Curso;
use Illuminate\Support\Facades\DB;

class AsignacionController extends Controller
{
    // 1. Muestra el formulario y la tabla de asignaciones actuales
  public function index()
{
    // 1. Consulta para cargar los profesores (ID 2 de la tabla roles)
    $profesores = User::join('roles', 'users.id_rol', '=', 'id_rol') 
        ->where('id_rol', 2) 
        ->select('users.*')
        ->distinct()
        ->get();
        
    // 2. Consulta para todos tus cursos disponibles
    $cursos = Curso::get();

    // 3. Consulta de asignaciones corregida con tu columna real 'grado' 🎯
    // Quitamos 'paralelo' de la consulta ya que tu tabla solo tiene id y grado
    $asignaciones = DB::table('asignaciones')
        ->join('users', 'asignaciones.id_profesor', '=', 'users.id')
        ->join('cursos', 'asignaciones.id_curso', '=', 'cursos.id')
        ->select('users.name as nom_profesor', 'cursos.grado as curso', 'asignaciones.estado as estados', 'users.last_name as ap_profesor')
        ->get();

    return view('director.asignaciones', compact('profesores', 'cursos', 'asignaciones'));
}



    // 2. Guarda la asignación en la base de datos evitando duplicados
    public function guardar(Request $request)
    {
        $request->validate([
            'id_profesor' => 'required|exists:users,id',
            'id_curso' => 'required|exists:cursos,id',
        ]);

        // Verificamos si ya existe la misma asignación para no duplicar datos
        $existe = DB::table('asignaciones')
            ->where('id_profesor', $request->id_profesor)
            ->where('id_curso', $request->id_curso)
            ->exists();

        if ($existe) {
            return back()->with('error', 'Este profesor ya está asignado a ese curso.');
        }

        // Insertamos en la tabla asignaciones
        DB::table('asignaciones')->insert([
            'id_profesor' => $request->id_profesor,
            'id_curso' => $request->id_curso,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('mensaje', '¡Asignación guardada con éxito!');
    }
}
