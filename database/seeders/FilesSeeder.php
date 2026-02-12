<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class FilesSeeder extends Seeder
{
    public function run(): void
    {
        $path = database_path('seeders/data/files.json');

        if (!file_exists($path)) {
            $this->command->error("No existe el archivo files.json");
            return;
        }

        $files = json_decode(file_get_contents($path), true);

        foreach ($files as $file) {

            // Find IDs by name
            $theme = DB::table('themes')->where('name', $file['tematica'])->first();
            $subtheme = DB::table('subthemes')->where('name', $file['subtematica'])->first();
            $scope = DB::table('scopes')->where('name', $file['ambito'])->first();
            $user = DB::table('users')->where('email', $file['usuario_correo'])->first();

            if (!$theme || !$subtheme || !$scope || !$user) {
                $this->command->warn("Missing data for file: " . $file['nombre']);
                continue;
            }

            // Check that the file exists in storage
            if (!Storage::disk('public')->exists('files/' . $file['archivo_real'])) {
                $this->command->warn("No existe el archivo en storage: " . $file['archivo_real']);
                continue;
            }

            // Insert into the database
            DB::table('files')->insert([
                'name' => $file['nombre'],
                'pdf_path' => 'files/' . $file['archivo_real'],
                'theme_id' => $theme->id,
                'subtheme_id' => $subtheme->id,
                'scope_id' => $scope->id,
                'reopening_date' => Carbon::parse($file['fecha_reapertura']),
                'closing_date' => Carbon::parse($file['fecha_cierre']),
                'created_at' => Carbon::now(),
                'user_id' => $user->id,
            ]);
        }
    }
}
