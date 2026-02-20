<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThemeSeeder extends Seeder
{
    public function run(): void
    {
        $themes = [
            'Agenda 2030',
            'Agua y Energía',
            'Cultura',
            'Economía y Empleo',
            'Planificación',
            'Recuperación',
            'Transición ecológica',
            'Reto demográfico',
        ];

        foreach ($themes as $index => $name) {
            DB::table('themes')->insert([
                'name' => $name
            ]);
        }
    }
}
