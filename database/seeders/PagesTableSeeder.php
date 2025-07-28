<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('pages')->insert([
            // Profil Pages
            [
                'title' => 'Sejarah, Visi & Misi',
                'slug' => 'sejarah-visi-misi',
                'category' => 'profil',
                'content' => '<h2>Sejarah, Visi & Misi</h2><p>Isi konten di sini...</p>',
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Struktur Organisasi',
                'slug' => 'struktur-organisasi',
                'category' => 'profil',
                'content' => '<h2>Struktur Organisasi</h2><p>Isi konten di sini...</p>',
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Wewenang Tugas & Fungsi',
                'slug' => 'wewenang-tugas-fungsi',
                'category' => 'profil',
                'content' => '<h2>Wewenang Tugas & Fungsi</h2><p>Isi konten di sini...</p>',
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Tugas Pokok Personal',
                'slug' => 'tugas-pokok-personal',
                'category' => 'profil',
                'content' => '<h2>Tugas Pokok Personal</h2><p>Isi konten di sini...</p>',
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Program Kerja',
                'slug' => 'program-kerja',
                'category' => 'profil',
                'content' => '<h2>Program Kerja</h2><p>Isi konten di sini...</p>',
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Informasi Pages
            [
                'title' => 'Agenda Kegiatan',
                'slug' => 'agenda-kegiatan',
                'category' => 'informasi',
                'content' => '<h2>Agenda Kegiatan</h2><p>Daftar agenda terbaru...</p>',
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Berita & Pengumuman',
                'slug' => 'berita-pengumuman',
                'category' => 'informasi',
                'content' => '<h2>Berita & Pengumuman</h2><p>Informasi terbaru...</p>',
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Galeri Kegiatan',
                'slug' => 'galeri-kegiatan',
                'category' => 'informasi',
                'content' => '<h2>Galeri Kegiatan</h2><p>Foto dokumentasi kegiatan...</p>',
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'FAQ',
                'slug' => 'faq',
                'category' => 'informasi',
                'content' => '<h2>FAQ</h2><p>Pertanyaan umum seputar lembaga...</p>',
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
