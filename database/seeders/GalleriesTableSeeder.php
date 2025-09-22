<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GalleriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('galleries')->delete();
        
        \DB::table('galleries')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Pelatihan Asesor Kompetensi',
                'slug' => 'pelatihan-asesor-kompetensi',
                'description' => 'Pembukaan Pelatihan Asesor Kompetensi LSP Trainer Kompeten Indonesia dihadiri oleh Kepala Dinas Tenaga Kerja dan Transmigrasi Provinsi Daerah Istimewa Yogyakarta dan Kepala Dinas Tenaga Kerja dan Transmigrasi Kabupaten Bantul.',
                'image_path' => 'galeri/ebEnOGuSGBRnIish0cVUqBAmEjqcBKmkkRSvnU7Q.jpg',
                'category_id' => 1,
                'album_id' => 1,
                'uploader' => 1,
                'status' => 'published',
                'taken_at' => '2025-08-19',
                'is_featured' => 1,
                'created_at' => '2025-08-19 02:27:03',
                'updated_at' => '2025-08-19 02:27:03',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Ramah Tamah',
                'slug' => 'ramah-tamah',
                'description' => 'Direktur LSP Trainer Kompeten Indonesia beramah tamah dengan Pejabat Dinas Tenaga Kerja Provinsi Daerah Istimewa Yogyakarta, dalam sesi coffe break pada Pelatihan Asesor Kompetensi bersama Master Asesor Agus Subagyo dan Master Asesor Sujiyanto',
                'image_path' => 'galeri/hMAsq0wXgDOBq8w6zfhM1ZG2cBYJgqGkpxNnN3VW.png',
                'category_id' => 1,
                'album_id' => 1,
                'uploader' => 1,
                'status' => 'published',
                'taken_at' => '2025-08-19',
                'is_featured' => 1,
                'created_at' => '2025-08-19 02:27:55',
                'updated_at' => '2025-08-19 02:27:55',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Rapat Koordinasi Pelatihan Asesor',
                'slug' => 'rapat-koordinasi-pelatihan-asesor',
                'description' => 'Rapat Koordinasi Pelatihan Asesor ini diselenggarakan di Kantor LSP Trainer Kompeten Indonesia pada hari Jum\'at, 25 Maret 2022 3 Hari menjelang Pelaksanaan Pelatihan Asesor Kompetensi.',
                'image_path' => 'galeri/aoquviKQZQWVx4EilybBBH03fCLzMfu46CU3OlnR.png',
                'category_id' => 1,
                'album_id' => 1,
                'uploader' => 1,
                'status' => 'published',
                'taken_at' => '2025-08-19',
                'is_featured' => 1,
                'created_at' => '2025-08-19 02:28:54',
                'updated_at' => '2025-08-19 02:28:54',
            ),
            3 => 
            array (
                'id' => 6,
                'title' => 'Pelatihan Asesor Kompetensi',
                'slug' => 'pelatihan-asesor-kompetensi',
                'description' => 'Master Asesor Agus Subagyo sebagai narasumber pada pelatihan Asesor Kompetensi',
                'image_path' => 'galeri/rxUd6F8zxYl82btIYNmKOqqPFirDyochGLxl7IMe.png',
                'category_id' => 1,
                'album_id' => 1,
                'uploader' => 1,
                'status' => 'published',
                'taken_at' => '2025-08-19',
                'is_featured' => 1,
                'created_at' => '2025-08-19 02:34:42',
                'updated_at' => '2025-08-19 02:34:42',
            ),
            4 => 
            array (
                'id' => 7,
                'title' => 'Pelatihan Auditor Mutu Sertifikasi',
                'slug' => 'pelatihan-auditor-mutu-sertifikasi',
                'description' => 'Dilaksanakan Hari Jum\'at - Ahad, 13 - 15 Mei 2022 di The Cube Hotel Yogyakarta dengan Nara Sumber Dr. Agus Sutarna, S. Kp., MN. Sc',
                'image_path' => 'galeri/uph6QdNf0ZULrLTtDH6fyIJD6IBaLtguI4k4oKte.png',
                'category_id' => 1,
                'album_id' => 1,
                'uploader' => 1,
                'status' => 'published',
                'taken_at' => '2025-08-19',
                'is_featured' => 1,
                'created_at' => '2025-08-19 02:35:37',
                'updated_at' => '2025-08-19 02:35:37',
            ),
            5 => 
            array (
                'id' => 8,
                'title' => 'Witness',
                'slug' => 'witness',
                'description' => 'Penyaksian Uji Kompetensi LSP Trainer Kompeten Indonesia oleh BNSP',
                'image_path' => 'galeri/nClsYJbIKbrlPuNN8qoOsbCGbnmj92H3ufbyFUhW.png',
                'category_id' => 1,
                'album_id' => 1,
                'uploader' => 1,
                'status' => 'published',
                'taken_at' => '2025-08-25',
                'is_featured' => 1,
                'created_at' => '2025-08-19 02:36:14',
                'updated_at' => '2025-08-25 07:34:10',
            ),
        ));
        
        
    }
}