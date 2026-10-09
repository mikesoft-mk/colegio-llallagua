<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Reconciles the legacy database schema with the schema tracked by Laravel.
     * The checks make this migration safe for the existing installation, where
     * these tables were originally created outside of migrations.
     */
    public function up(): void
    {
        if (! Schema::hasTable('roles')) {
            Schema::create('roles', function (Blueprint $table) {
                $table->id();
                $table->string('nombre_rol');
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('cursos')) {
            Schema::create('cursos', function (Blueprint $table) {
                $table->id();
                $table->string('grado', 25);
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('docentes')) {
            Schema::create('docentes', function (Blueprint $table) {
                $table->id();
                $table->foreignId('id_usuario')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
                $table->foreignId('id_curso')->nullable()->constrained('cursos')->nullOnDelete()->cascadeOnUpdate();
                $table->string('especialidad_asignatura');
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('estudiantes')) {
            Schema::create('estudiantes', function (Blueprint $table) {
                $table->id();
                $table->foreignId('id_curso')->constrained('cursos')->cascadeOnDelete()->cascadeOnUpdate();
                $table->string('ci_estudiante');
                $table->string('apellidos_nombres');
                $table->date('fecha_nacimiento');
                $table->string('pdf_trimestre1')->nullable();
                $table->string('pdf_trimestre2')->nullable();
                $table->string('pdf_trimestre3')->nullable();
                $table->boolean('estado_activo')->default(true);
                $table->timestamps();
            });
        }

        Schema::table('users', function (Blueprint $table) {
            if (! Schema::hasColumn('users', 'id_rol')) {
                $table->foreignId('id_rol')->nullable()->after('id')->constrained('roles')->nullOnDelete()->cascadeOnUpdate();
            }

            if (! Schema::hasColumn('users', 'last_name')) {
                $table->string('last_name')->nullable()->after('name');
            }

            if (! Schema::hasColumn('users', 'ci_user')) {
                $table->string('ci_user')->nullable()->after('last_name');
            }

            if (! Schema::hasColumn('users', 'user_name')) {
                $table->string('user_name')->nullable()->after('ci_user');
            }

            if (! Schema::hasColumn('users', 'estado_activo')) {
                $table->boolean('estado_activo')->default(true)->after('password');
            }
        });
    }

    /**
     * This is a legacy reconciliation migration. Rolling it back must never
     * drop tables that may contain data created before migrations existed.
     */
    public function down(): void
    {
        // Intentionally left blank.
    }
};
