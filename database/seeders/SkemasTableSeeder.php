<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkemasTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('skemas')->delete();

        DB::table('skemas')->insert([
            [
                'id' => 1,
                'kode' => 'SKM-LSPTKI-05-2022',
                'nama' => 'Instruktur Master',
                'jenis' => 'Okupasi',
                'slug' => 'instruktur-master',
                'thumbnail' => 'skema/thumb/oyTytMm6YaBS2EEcyVVn2S7Q827Jkx7C2KatnUEi.jpg',
                'pdf_path' => null,
                'ringkasan' => 'Skema sertifikasi okupasi Instruktur Master...',
                'file_skema' => '1755658675_instruktur_master.pdf',
                'level' => 'Level 5',
                'kuota' => 0,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'kode' => 'SKM-LSPTKI-04-2022',
                'nama' => 'Instruktur',
                'jenis' => 'Okupasi',
                'slug' => 'instruktur',
                'thumbnail' => 'skema/thumb/ZrdkoGYZpJ9fB9LidG9u8IgV5GKBrnb6dfKM10ya.jpg',
                'pdf_path' => null,
                'ringkasan' => 'Skema sertifikasi okupasi Instruktur...',
                'file_skema' => '1755658810_instruktur.pdf',
                'level' => 'Level 4',
                'kuota' => 0,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'kode' => 'SKM-LSPTKI-03-2022',
                'nama' => 'Instruktur Junior',
                'jenis' => 'Okupasi',
                'slug' => 'instruktur-junior',
                'thumbnail' => 'skema/thumb/H655i6dLCu9W3fRQeSn3xaS3TrbP5D1VhsvbQB3H.jpg',
                'pdf_path' => null,
                'ringkasan' => 'Skema sertifikasi okupasi Instruktur Junior...',
                'file_skema' => '1755658844_instruktur_junior.pdf',
                'level' => 'Level 3',
                'kuota' => 0,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'kode' => 'SKM-LSPTKI-02-2022',
                'nama' => 'Pelatih di Tempat Kerja',
                'jenis' => 'Okupasi',
                'slug' => 'pelatih-di-tempat-kerja',
                'thumbnail' => 'skema/thumb/sJypOsvTZ8tA1NP0jeGazoYN6v5L7a13Ozp1H5ww.jpg',
                'pdf_path' => null,
                'ringkasan' => 'Skema sertifikasi okupasi Pelatih di Tempat Kerja...',
                'file_skema' => '1755658875_pelatih_di_tempat_kerja.pdf',
                'level' => 'Level 3',
                'kuota' => 0,
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'kode' => 'SKM-LSPTKI-06-2022',
                'nama' => 'Penyelenggara Pelatihan',
                'jenis' => 'Okupasi',
                'slug' => 'penyelenggara-pelatihan',
                'thumbnail' => 'skema/thumb/kpvfhS7mFeZk9Wrx5hDdGwZ8Uoro1ArzOXuTeowQ.jpg',
                'pdf_path' => null,
                'ringkasan' => 'Skema sertifikasi okupasi Penyelenggara Pelatihan...',
                'file_skema' => '1755658904_penyelenggara_pelatihan.pdf',
                'level' => 'Level 4',
                'kuota' => 0,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
