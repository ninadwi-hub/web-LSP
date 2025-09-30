<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Buat Admin tunggal jika belum ada
        User::updateOrCreate(
            ['email' => 'untung@gmail.com'], // kondisi cek email
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );

        // User multi-role (Asesor + Asesi)
        DB::table('users')->updateOrInsert(
            ['email' => 'multi@example.com'],
            [
                'name' => 'User Multi Role',
                'password' => Hash::make('password123'),
                'role' => 'asesor,asesi', // multi-role
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
