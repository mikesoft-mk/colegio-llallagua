<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('asignaciones', 'estado')) {
            Schema::table('asignaciones', function (Blueprint $table) {
                $table->integer('estado')->nullable()->after('id_curso');
            });
        }
    }

    /**
     * The column may predate migrations in the existing installation.
     */
    public function down(): void
    {
        // Intentionally left blank.
    }
};
