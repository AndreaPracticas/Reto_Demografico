<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fields = [
            ['name' => 'Noticia', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Experiencia', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Actividad', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Inserta los campos en la tabla 'fields'
        DB::table('fields')->insert($fields);
    }
}