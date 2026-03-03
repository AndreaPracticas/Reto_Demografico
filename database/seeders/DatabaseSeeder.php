<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\FieldSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call([
            UsersSeeder::class,
            ThemeSeeder::class,
            SubthemeSeeder::class,
            ScopesSeeder::class,
            FieldSeeder::class,
            FilesSeeder::class,
            NewsSeeder::class,
        ]);
    }
}
