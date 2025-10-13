<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skema;
use Illuminate\Support\Str;

class SkemaSeeder extends Seeder
{
    public function run()
    {
        $skemas = [
            [
                'kode' => 'IJ',
                'nama' => 'Instruktur Junior',
                'jenis' => 'KKNI Level 6',
                'kategori' => 'Okupasi',
                'ringkasan' => 'Skema sertifikasi untuk instruktur junior yang bertanggung jawab dalam melaksanakan pelatihan dasar',
                'thumbnail' => null,
                'pdf_path' => null,
                'file_skema' => null,
            ],
            [
                'kode' => 'PP',
                'nama' => 'Penyelenggara Pelatihan',
                'jenis' => 'KKNI Level 6',
                'kategori' => 'Okupasi',
                'ringkasan' => 'Skema sertifikasi untuk penyelenggara pelatihan kerja',
                'thumbnail' => null,
                'pdf_path' => null,
                'file_skema' => null,
            ],
            [
                'kode' => 'PLK',
                'nama' => 'Pelatih di Tempat Kerja',
                'jenis' => 'KKNI Level 5',
                'kategori' => 'Okupasi',
                'ringkasan' => 'Skema sertifikasi untuk pelatih yang bekerja di lingkungan kerja',
                'thumbnail' => null,
                'pdf_path' => null,
                'file_skema' => null,
            ],
            [
                'kode' => 'PP-TK',
                'nama' => 'Perancang Program Pelatihan Kerja',
                'jenis' => 'KKNI Level 7',
                'kategori' => 'Okupasi',
                'ringkasan' => 'Skema sertifikasi untuk perancang dan pengembang program pelatihan kerja',
                'thumbnail' => null,
                'pdf_path' => null,
                'file_skema' => null,
            ],
        ];

        foreach ($skemas as $skema) {
            // buat slug awal
            $originalSlug = Str::slug($skema['nama']);
            $slug = $originalSlug;
            $counter = 1;

            // cek apakah slug sudah ada, jika ya tambahkan angka
            while (Skema::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }

            // set slug unik ke data
            $skema['slug'] = $slug;

            // simpan ke database (update jika kode sudah ada, buat baru jika belum)
            Skema::updateOrCreate(
                ['kode' => $skema['kode']],
                $skema
            );
        }

        $this->command->info('Skema berhasil di-seed: ' . count($skemas) . ' data');
    }
}
