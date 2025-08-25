<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cek apakah sudah ada user admin
        if (!User::where('email', 'ninaadmin@example.com')->exists()) {
            User::create([
                'name' => 'Nina Admin',
                'email' => 'ninaadmin@example.com',
                'password' => Hash::make('password123'),
            ]);
        }
    }
}
