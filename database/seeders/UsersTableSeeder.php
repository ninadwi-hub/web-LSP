<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();

        \DB::table('users')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'Nina',
                'email' => 'admin@example.com',
                'email_verified_at' => '2025-08-18 01:03:58',
                'password' => '$2y$12$OzF4vnhSAIOHuIHTE3ZEDO7g13y5QDIsWCkXAnb3RLPEA7kTewMOq', // password lama
                'role' => 'admin',
                'remember_token' => NULL,
                'created_at' => '2025-08-18 01:03:58',
                'updated_at' => '2025-08-25 02:48:28',
            ),
            1 =>
            array(
                'id' => 2,
                'name' => 'Admin',
                'email' => 'untung@gmail.com',
                'email_verified_at' => '2025-08-18 01:03:58',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // default: password
                'role' => 'admin',
                'remember_token' => NULL,
                'created_at' => '2025-08-18 01:03:58',
                'updated_at' => '2025-08-18 01:03:58',
            ),
            2 =>
            array(
                'id' => 3,
                'name' => 'superadmin',
                'email' => 'superadmin@example.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'), // bisa login dengan password: password
                'role' => 'admin',
                'remember_token' => NULL,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            3 =>
            array(
                'id' => 4,
                'name' => 'User Multi Role',
                'email' => 'multi@example.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password123'),
                'role' => 'asesor,asesi', // multi-role
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            )
        ));
    }
}
