<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginUserSeeder extends Seeder
{
    public function run()
    {
        DB::table('login_users')->insert([
            'role' => 'asesi', // pakai string
            'name' => 'Nina',
            'phone' => '08123456789',
            'email' => 'nina@example.com',
            'password' => Hash::make('password123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
