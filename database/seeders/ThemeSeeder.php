<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThemeSeeder extends Seeder
{
    public function run(): void
    {
        $themes = [
            ['name' => 'Agenda 2030',           'icon' => 'agenda2030'],
            ['name' => 'Agua y Energía',         'icon' => 'aguayenergia'],
            ['name' => 'Cultura',                'icon' => 'cultura'],
            ['name' => 'Economía y Empleo',      'icon' => 'economiayempleo'],
            ['name' => 'Planificación',          'icon' => 'planificacion'],
            ['name' => 'Recuperación',           'icon' => 'recuperacion'],
            ['name' => 'Transición ecológica',   'icon' => 'transicionecologica'],
            ['name' => 'Reto demográfico',       'icon' => 'retodemografico'],
        ];

        foreach ($themes as $theme) {
            DB::table('themes')->insert([
                'name'       => $theme['name'],
                'icon'       => $theme['icon'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}