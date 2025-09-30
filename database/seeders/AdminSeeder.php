<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Cek apakah email sudah ada
        if (!User::where('email', 'untung@gmail.com')->exists()) {
            User::create([
                'name' => 'Admin',
                'email' => 'untung@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]);
            User::create([
                'name' => 'superadmin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]);
        }
    }
}
