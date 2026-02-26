<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@user.com',
                'password' => Hash::make('123456'),
                'is_admin' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Normal User',
                'email' => 'user@user.com',
                'password' => Hash::make('123456'),
                'is_admin' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

