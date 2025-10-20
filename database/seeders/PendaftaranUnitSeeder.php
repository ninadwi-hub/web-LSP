<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PendaftaranUnitSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pendaftaran_unit')->insert([
            [
                'pendaftaran_id' => 1, // ambil dari tabel pendaftaran_asesmens
                'unit_id' => 1,        // ambil dari tabel unit_kompetensis
                'dipilih' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pendaftaran_id' => 1,
                'unit_id' => 2,
                'dipilih' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pendaftaran_id' => 2,
                'unit_id' => 3,
                'dipilih' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
