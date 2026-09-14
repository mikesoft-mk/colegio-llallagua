<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiantes extends Model
{
    // Le indicamos a Laravel el nombre en singular de tu tabla real 🎯
    protected $table = 'estudiantes'; 

    // Permitimos la inserción de tus columnas reales
    protected $fillable = [
        'id_curso',
        'ci_estudiante',
        'apellidos_nombres',
        'fecha_nacimiento',
        'pdf_trimestre1',
        'pdf_trimestre2',
        'pdf_trimestre3',
        'estado_activo'
    ];
}
