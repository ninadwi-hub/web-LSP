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
    ]);
}

<<<<<<< HEAD
=======

        // Jalankan seeder lain
        $this->call(UsersTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(DownloadsTableSeeder::class);
        $this->call(KategorisTableSeeder::class);
        $this->call(InfosTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(SkemasTableSeeder::class);
        $this->call(UnitKompetensisTableSeeder::class);
        $this->call(GalleriesTableSeeder::class);
    }
>>>>>>> 7b10650a7f8560fcf8a9656db74811686325dd35
}
