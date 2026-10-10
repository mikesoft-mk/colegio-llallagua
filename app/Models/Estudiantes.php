<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Estudiantes extends Model
{
    protected $table = 'estudiantes';

    protected $fillable = [
        'id_curso',
        'ci_estudiante',
        'apellidos_nombres',
        'fecha_nacimiento',
        'pdf_trimestre1',
        'pdf_trimestre2',
        'pdf_trimestre3',
        'estado_activo',
    ];

    public function curso(): BelongsTo
    {
        return $this->belongsTo(Curso::class, 'id_curso');
    }
}
