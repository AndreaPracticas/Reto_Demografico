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
            'Noticia',
            'Experiencia',
            'Enlaces de Interés',
        ];

        // Inserta los campos en la tabla 'fields'
        foreach ($fields as $index => $name) {
            DB::table('fields')->insert([
                'name' => $name,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}