<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat user admin default
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        // Jalankan seeder lain
        $this->call([
            UsersTableSeeder::class,
            ContactsTableSeeder::class,
            DownloadsTableSeeder::class,
            KategorisTableSeeder::class,
            InfosTableSeeder::class,
            PagesTableSeeder::class,
            MenusTableSeeder::class,
            SkemaSeeder::class,               
            UnitKompetensisTableSeeder::class,
            GalleriesTableSeeder::class,
            AsesorSeeder::class,
            JadwalAsesmenSeeder::class,
    BiodataAsesiSeeder::class,
    DokumenAsesiSeeder::class,

        ]);
    }
}
