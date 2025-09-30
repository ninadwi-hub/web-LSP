<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AsesorSeeder extends Seeder
{
    public function run()
    {
        // Admin
        User::updateOrCreate(
            ['email' => 'admin@lsp.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        // Asesor Uji
        $asesors = [
            ['name' => 'Adi Soeprapto', 'email' => 'adi@asesor.com'],
            ['name' => 'Dewi Lestari', 'email' => 'dewi@asesor.com'],
            ['name' => 'Leli Mardiana', 'email' => 'leli@asesor.com'],
            ['name' => 'Tin Dels Marco Ndawu', 'email' => 'tin@asesor.com'],
            ['name' => 'Cahyo Budi Santoso', 'email' => 'cahyo@asesor.com'],
            ['name' => 'Untung Subagyo', 'email' => 'untung@asesor.com'],
            ['name' => 'Bayu Kurniawan', 'email' => 'bayu@asesor.com'],
            ['name' => 'Moh. Badaruddin Hadi', 'email' => 'badar@asesor.com'],
            ['name' => 'Siti Nurhaliza', 'email' => 'siti@asesor.com'],
            ['name' => 'Ahmad Dhani', 'email' => 'ahmad@asesor.com'],
        ];

        foreach ($asesors as $asesor) {
            User::updateOrCreate(
                ['email' => $asesor['email']], // Cek berdasarkan email
                [
                    'name' => $asesor['name'],
                    'password' => Hash::make('password'),
                    'role' => 'asesor',
                ]
            );
        }
    }
}