<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\LoginUser;

class LoginUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LoginUser::create([
            'role' => 'user',
            'name' => 'Nina',
            'phone' => '08123456789',
            'email' => 'nina@example.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
