<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menus')->delete();
        
        \DB::table('menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Home',
                'slug' => 'home',
                'url' => '/',
                'route' => NULL,
                'type' => 'internal',
                'page_id' => NULL,
                'parent_id' => NULL,
                'order' => 1,
                'is_active' => 1,
                'created_at' => '2025-08-24 20:52:34',
                'updated_at' => '2025-08-24 20:52:34',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Profil',
                'slug' => 'profil',
                'url' => NULL,
                'route' => NULL,
                'type' => 'internal',
                'page_id' => NULL,
                'parent_id' => NULL,
                'order' => 2,
                'is_active' => 1,
                'created_at' => '2025-08-24 20:52:34',
                'updated_at' => '2025-08-24 20:52:34',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Sertifikasi',
                'slug' => 'sertifikasi',
                'url' => NULL,
                'route' => NULL,
                'type' => 'internal',
                'page_id' => NULL,
                'parent_id' => NULL,
                'order' => 3,
                'is_active' => 1,
                'created_at' => '2025-08-24 20:52:34',
                'updated_at' => '2025-08-24 20:52:34',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'Media',
                'slug' => 'media',
                'url' => NULL,
                'route' => NULL,
                'type' => 'internal',
                'page_id' => NULL,
                'parent_id' => NULL,
                'order' => 4,
                'is_active' => 1,
                'created_at' => '2025-08-24 20:52:34',
                'updated_at' => '2025-08-24 20:52:34',
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'Informasi',
                'slug' => 'informasi',
                'url' => NULL,
                'route' => NULL,
                'type' => 'internal',
                'page_id' => NULL,
                'parent_id' => NULL,
                'order' => 5,
                'is_active' => 1,
                'created_at' => '2025-08-24 20:52:34',
                'updated_at' => '2025-08-24 20:52:34',
            ),
            5 => 
            array (
                'id' => 7,
                'title' => 'Skema Sertifikasi',
                'slug' => 'skema-sertifikasi',
                'url' => '/skema-sertifikasi',
                'route' => NULL,
                'type' => 'internal',
                'page_id' => NULL,
                'parent_id' => 3,
                'order' => 1,
                'is_active' => 1,
                'created_at' => '2025-08-24 20:52:34',
                'updated_at' => '2025-08-24 20:52:34',
            ),
            6 => 
            array (
                'id' => 38,
                'title' => 'Kontak Kami',
                'slug' => NULL,
                'url' => NULL,
                'route' => NULL,
                'type' => 'internal',
                'page_id' => 12,
                'parent_id' => NULL,
                'order' => 12,
                'is_active' => 1,
                'created_at' => '2025-08-24 21:45:07',
                'updated_at' => '2025-08-25 01:10:03',
            ),
            7 => 
            array (
                'id' => 39,
                'title' => 'Tempat Uji Kompetensi',
                'slug' => 'tempat-uji-kompetensi',
                'url' => NULL,
                'route' => NULL,
                'type' => 'internal',
                'page_id' => 9,
                'parent_id' => 3,
                'order' => 2,
                'is_active' => 1,
                'created_at' => '2025-08-24 21:53:39',
                'updated_at' => '2025-08-24 21:53:39',
            ),
            8 => 
            array (
                'id' => 40,
                'title' => 'Asesor Kompetensi',
                'slug' => 'asesor-kompetensi',
                'url' => NULL,
                'route' => NULL,
                'type' => 'internal',
                'page_id' => 10,
                'parent_id' => 3,
                'order' => 3,
                'is_active' => 1,
                'created_at' => '2025-08-24 21:53:39',
                'updated_at' => '2025-08-24 21:53:39',
            ),
            9 => 
            array (
                'id' => 41,
                'title' => 'Pemegang Sertifikat',
                'slug' => 'pemegang-sertifikat',
                'url' => NULL,
                'route' => NULL,
                'type' => 'internal',
                'page_id' => 11,
                'parent_id' => 3,
                'order' => 4,
                'is_active' => 1,
                'created_at' => '2025-08-24 21:53:39',
                'updated_at' => '2025-08-24 21:53:39',
            ),
            10 => 
            array (
                'id' => 42,
                'title' => 'FAQ',
                'slug' => 'faq',
                'url' => NULL,
                'route' => NULL,
                'type' => 'internal',
                'page_id' => 1,
                'parent_id' => 5,
                'order' => 1,
                'is_active' => 1,
                'created_at' => '2025-08-24 22:27:05',
                'updated_at' => '2025-08-24 22:27:05',
            ),
            11 => 
            array (
                'id' => 43,
                'title' => 'Kelembagaan LSP',
                'slug' => 'kelembagaan-lsp',
                'url' => NULL,
                'route' => NULL,
                'type' => 'internal',
                'page_id' => 2,
                'parent_id' => 2,
                'order' => 2,
                'is_active' => 1,
                'created_at' => '2025-08-24 22:27:05',
                'updated_at' => '2025-08-25 04:07:59',
            ),
            12 => 
            array (
                'id' => 44,
                'title' => 'Visi & Misi',
                'slug' => 'visi-misi',
                'url' => NULL,
                'route' => NULL,
                'type' => 'internal',
                'page_id' => 3,
                'parent_id' => 2,
                'order' => 3,
                'is_active' => 1,
                'created_at' => '2025-08-24 22:27:06',
                'updated_at' => '2025-08-24 22:27:06',
            ),
            13 => 
            array (
                'id' => 45,
                'title' => 'Struktur Organisasi',
                'slug' => 'struktur-organisasi',
                'url' => NULL,
                'route' => NULL,
                'type' => 'internal',
                'page_id' => 4,
                'parent_id' => 2,
                'order' => 4,
                'is_active' => 1,
                'created_at' => '2025-08-24 22:27:06',
                'updated_at' => '2025-08-24 22:27:06',
            ),
            14 => 
            array (
                'id' => 46,
                'title' => 'Brosur LSP',
                'slug' => 'brosur-lsp',
                'url' => NULL,
                'route' => NULL,
                'type' => 'internal',
                'page_id' => 5,
                'parent_id' => 4,
                'order' => 1,
                'is_active' => 1,
                'created_at' => '2025-08-24 22:27:06',
                'updated_at' => '2025-08-24 22:27:06',
            ),
            15 => 
            array (
                'id' => 47,
                'title' => 'Wewenang, Tugas & Fungsi',
                'slug' => 'wewenang-tugas-fungsi',
                'url' => NULL,
                'route' => NULL,
                'type' => 'internal',
                'page_id' => 6,
                'parent_id' => 2,
                'order' => 5,
                'is_active' => 1,
                'created_at' => '2025-08-24 22:27:06',
                'updated_at' => '2025-08-24 22:27:06',
            ),
            16 => 
            array (
                'id' => 48,
                'title' => 'Tugas Pokok Personal',
                'slug' => 'tugas-pokok-personal',
                'url' => NULL,
                'route' => NULL,
                'type' => 'internal',
                'page_id' => 7,
                'parent_id' => 2,
                'order' => 6,
                'is_active' => 1,
                'created_at' => '2025-08-24 22:27:06',
                'updated_at' => '2025-08-24 22:27:06',
            ),
            17 => 
            array (
                'id' => 49,
                'title' => 'Program Kerja',
                'slug' => 'program-kerja',
                'url' => NULL,
                'route' => NULL,
                'type' => 'internal',
                'page_id' => 8,
                'parent_id' => 2,
                'order' => 7,
                'is_active' => 1,
                'created_at' => '2025-08-24 22:27:06',
                'updated_at' => '2025-08-24 22:27:06',
            ),
            18 => 
            array (
                'id' => 50,
                'title' => 'Artikel',
                'slug' => NULL,
                'url' => '/informasi/artikel
',
                'route' => NULL,
                'type' => 'external',
                'page_id' => NULL,
                'parent_id' => 5,
                'order' => 5,
                'is_active' => 1,
                'created_at' => '2025-08-29 02:58:02',
                'updated_at' => '2025-08-29 03:07:41',
            ),
            19 => 
            array (
                'id' => 51,
                'title' => 'Unduh',
                'slug' => NULL,
                'url' => '/unduh
',
                'route' => NULL,
                'type' => 'internal',
                'page_id' => NULL,
                'parent_id' => NULL,
                'order' => 6,
                'is_active' => 1,
                'created_at' => '2025-08-30 02:55:05',
                'updated_at' => '2025-08-30 02:56:16',
            ),
        ));
        
        
    }
}