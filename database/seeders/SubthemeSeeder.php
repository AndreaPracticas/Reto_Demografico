<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubthemeSeeder extends Seeder
{
    public function run(): void
    {
        $mapping = [
            'Agenda 2030' => ['Agenda 2030', 'Digitalización', 'Reto Demográfico', 'Desarrollo rural'],
            'Agua y Energía' => ['Energía', 'Agua'],
            'Cultura' => ['Cultura'],
            'Economía y Empleo' => ['Economía', 'Empleo', 'Comercio y turismo', 'Innovación'],
            'Planificación' => ['Movilidad', 'Planeamiento', 'Vivienda'],
            'Recuperación' => ['Recuperación'],
            'Transición ecológica' => [
                'Innovación','Reto demográfico','Entorno urbano','Infraestructura verde',
                'Entorno saludable','Biodiversidad-Economía azul','Economía azul','Reserva de la biosfera',
                'Movilidad','Parques Nacionales','Cambio climático','Biodiversidad','Economía Circular'
            ]
        ];

        foreach ($mapping as $themeName => $subthemes) {
            $theme = DB::table('themes')->where('name', $themeName)->first();

            foreach ($subthemes as $subthemeName) {
                DB::table('subthemes')->insert([
                    'theme_id' => $theme->id,
                    'name' => $subthemeName
                ]);
            }
        }
    }
}
