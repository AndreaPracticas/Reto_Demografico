<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScopesSeeder extends Seeder
{
    public function run(): void
    {
        $scopes = ['Regionales', 'Nacionales', 'Europeas'];

        foreach ($scopes as $index => $name) {
            DB::table('scopes')->insert([
                'name' => $name
            ]);
        }
    }
}
