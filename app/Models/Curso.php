<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    // Le indicamos a Laravel el nombre exacto de tu tabla
    protected $table = 'cursos'; 
    
    protected $fillable = ['grado'];
 

    public function profesores()
{
    return $this->belongsToMany(User::class, 'asignaciones', 'id_curso', 'id_profesor');
}
}

