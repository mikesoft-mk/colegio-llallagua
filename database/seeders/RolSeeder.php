<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        DB::table('roles')->upsert([
            ['id' => 1, 'nombre_rol' => 'Director', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 2, 'nombre_rol' => 'Profesor', 'created_at' => $now, 'updated_at' => $now],
        ], ['id'], ['nombre_rol', 'updated_at']);
    }
}
