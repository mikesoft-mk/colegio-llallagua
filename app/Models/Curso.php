<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Curso extends Model
{
    protected $table = 'cursos';

    protected $fillable = ['grado'];

    public function profesores(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'asignaciones', 'id_curso', 'id_profesor');
    }

    public function estudiantes(): HasMany
    {
        return $this->hasMany(Estudiantes::class, 'id_curso');
    }
}
