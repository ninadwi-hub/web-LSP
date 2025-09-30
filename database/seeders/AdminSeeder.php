<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Admin biasa
        User::firstOrCreate(
            ['email' => 'untung@gmail.com'], // cek berdasarkan email
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        // Superadmin
        User::firstOrCreate(
            ['email' => 'admin@example.com'], // cek berdasarkan email
            [
                'name' => 'superadmin',
                'password' => Hash::make('darwinnigga'),
                'role' => 'admin',
            ]
        );
    }
}
