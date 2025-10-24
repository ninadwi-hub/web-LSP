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
        // 🔹 Buat user admin default
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        // 🔹 Jalankan seeder lain dengan urutan relasi yang benar
        $this->call([
            // --- Data dasar ---
            UsersTableSeeder::class,
            ContactsTableSeeder::class,
            PagesTableSeeder::class,       // harus dijalankan sebelum Menus
            MenusTableSeeder::class,
            KategorisTableSeeder::class,
            InfosTableSeeder::class,
            GalleriesTableSeeder::class,
            DownloadsTableSeeder::class,

            // --- Skema dan unit ---
            SkemasTableSeeder::class,
            SkemaSeeder::class,
            UnitKompetensisTableSeeder::class,

            // --- Data referensi lainnya ---
            TukSeeder::class,
            AsesorSeeder::class,
            AsesorKompetensiSeeder::class,

            // --- Data asesmen & peserta ---
            JadwalAsesmenSeeder::class,
            BiodataAsesiSeeder::class,
            DokumenAsesiSeeder::class,

            // --- Data yang bergantung ke atas ---
            PendaftaranAsesmenSeeder::class,
            PendaftaranUnitSeeder::class,
        ]);
    }
}
