<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('asignaciones', function (Blueprint $table) {
            $table->id();
            // Conecta con tu tabla 'users' (el profesor)
            $table->foreignId('id_profesor')->constrained('users')->onDelete('cascade');
            // Conecta con tu tabla 'cursos' (ej: 2do A)
            $table->foreignId('id_curso')->constrained('cursos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('asignaciones');
    }
};
