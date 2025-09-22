<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UnitKompetensisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('unit_kompetensis')->delete();
        
        \DB::table('unit_kompetensis')->insert(array (
            0 => 
            array (
                'id' => 1,
                'skema_id' => 1,
                'kode_unit' => 'N.78SPS02.009.2',
                'judul_unit' => 'Menentukan Kebutuhan Pelatihan Mikro',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'skema_id' => 1,
                'kode_unit' => 'N.78SPS02.013.1',
                'judul_unit' => 'Menyusun Rencana Bisnis',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'skema_id' => 1,
                'kode_unit' => 'N.78SPS02.014.2',
                'judul_unit' => 'Merencanakan Strategi Pemasaran Pelatihan Kerja',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'skema_id' => 1,
                'kode_unit' => 'N.78SPS02.016.1',
                'judul_unit' => 'Merancang Platform E-learning',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'skema_id' => 1,
                'kode_unit' => 'N.78SPS02.027.2',
                'judul_unit' => 'Mengembangkan Jejaring Kerjasama Kemitraan Antar Lembaga/Perusahaan',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'skema_id' => 1,
                'kode_unit' => 'N.78SPS02.030.1',
                'judul_unit' => 'Memfasilitasi E-learning',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'skema_id' => 1,
                'kode_unit' => 'N.78SPS02.033.1',
                'judul_unit' => 'Melakukan Negosiasi dengan Mitra Lembaga Pelatihan Kerja',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'skema_id' => 1,
                'kode_unit' => 'N.78SPS02.059.2',
                'judul_unit' => 'Memasarkan Program Pelatihan Kerja',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'skema_id' => 1,
                'kode_unit' => 'N.78SPS01.001.2',
                'judul_unit' => 'Membuat Peta Kompetensi',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'skema_id' => 1,
                'kode_unit' => 'N.78SPS01.003.2',
                'judul_unit' => 'Merumuskan Standar Kompetensi',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'skema_id' => 1,
                'kode_unit' => 'N.78SPS02.008.2',
                'judul_unit' => 'Menentukan Kebutuhan Pelatihan Makro',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'skema_id' => 1,
                'kode_unit' => 'N.78SPS02.023.1',
                'judul_unit' => 'Mengembangkan Program Pelatihan Kerja',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'skema_id' => 1,
                'kode_unit' => 'N.78SPS02.084.2',
                'judul_unit' => 'Mengevaluasi Pelaksanaan Suatu Program Pelatihan Kerja',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'skema_id' => 1,
                'kode_unit' => 'N.78SPS02.086.2',
                'judul_unit' => 'Mengevaluasi Biaya Suatu Program Pelatihan Kerja',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'skema_id' => 2,
                'kode_unit' => 'N.78SPS02.012.2',
                'judul_unit' => 'Menyusun program Pelatihan Kerja',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'skema_id' => 2,
                'kode_unit' => 'N.78SPS02.019.2',
                'judul_unit' => 'Merencanakan Penyajian Materi Pelatihan Kerja',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'skema_id' => 2,
                'kode_unit' => 'N.78SPS02.022.1',
                'judul_unit' => 'Merencanakan Evaluasi Hasil Pembelajaran',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'skema_id' => 2,
                'kode_unit' => 'N.78SPS02.028.2',
            'judul_unit' => 'Melaksanakan Pelatihan tatap Muka (face to face)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'skema_id' => 2,
                'kode_unit' => 'N.78SPS02.035.1',
            'judul_unit' => 'Menerapkan Keselamatan dan Kesehatan Kerja (K3) di Lembaga Pelatihan Kerja',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'skema_id' => 2,
                'kode_unit' => 'N.78SPS02.038.1',
                'judul_unit' => 'Mengelola Pemenuhan Persyaratan Bahasa, Literasi, dan Berhitung dalam Proses Pembelajaran',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'skema_id' => 2,
                'kode_unit' => 'N.78SPS02.075.1',
                'judul_unit' => 'Menilai Kemajuan Kompetensi Peserta Pelatihan Secara Individu',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'skema_id' => 2,
                'kode_unit' => 'N.78SPS02.010.2',
                'judul_unit' => 'Menentukan Kebutuhan Pelatihan Individu',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'skema_id' => 2,
                'kode_unit' => 'N.78SPS02.015.1',
                'judul_unit' => 'Merancang Strategi Pembelajran',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'skema_id' => 2,
                'kode_unit' => 'N.78SPS02.039.2',
                'judul_unit' => 'Mengelola Bahan Pelatihan Kerja',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'skema_id' => 2,
                'kode_unit' => 'N.78SPS02.041.2',
                'judul_unit' => 'Mengelola Peralatan Pelatihan Kerja',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'skema_id' => 2,
                'kode_unit' => 'N.78SPS02.063.1',
                'judul_unit' => 'Menyiapkan Pelaksanaan Pelatihan atau Asesmen Berbasis Kompetensi',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'skema_id' => 2,
                'kode_unit' => 'N.78SPS02.064.1',
            'judul_unit' => 'Melaksanakan Pelatihan Berbasis Kompetensi (PBK)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'skema_id' => 2,
                'kode_unit' => 'N.78SPS02.068.1',
                'judul_unit' => 'Melakukan Asesmen Berbasis Kompetensi',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'skema_id' => 3,
                'kode_unit' => 'N.78SPS02.011.1',
                'judul_unit' => 'Mengidentifikasi Standar Kompetensi dan Kualifikasi Kerja',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'skema_id' => 3,
                'kode_unit' => 'N.78SPS02.019.2',
                'judul_unit' => 'Merencanakan Penyajian Materi Pelatihan Kerja',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'skema_id' => 3,
                'kode_unit' => 'N.78SPS02.028.2',
            'judul_unit' => 'Melaksanakan Pelatihan tatap Muka (face to face)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'skema_id' => 3,
                'kode_unit' => 'N.78SPS02.035.1',
            'judul_unit' => 'Menerapkan Keselamatan dan Kesehatan Kerja (K3) di Lembaga Pelatihan Kerja',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'skema_id' => 3,
                'kode_unit' => 'N.78SPS02.061.1',
                'judul_unit' => 'Melakukan Komunikasi di Tempat Kerja',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'skema_id' => 3,
                'kode_unit' => 'N.78SPS02.039.2',
                'judul_unit' => 'Mengelola Bahan Pelatihan Kerja',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'skema_id' => 3,
                'kode_unit' => 'N.78SPS02.041.2',
                'judul_unit' => 'Mengelola Peralatan Pelatihan Kerja',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'skema_id' => 3,
                'kode_unit' => 'N.78SPS02.044.1',
                'judul_unit' => 'Memelihara Fasilitas Pelatihan Kerja',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'skema_id' => 3,
                'kode_unit' => 'N.78SPS02.075.1',
                'judul_unit' => 'Menilai Kemajuan Kompetensi Peserta Pelatihan Secara Individu',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'skema_id' => 4,
                'kode_unit' => 'N.78SPS02.011.1',
                'judul_unit' => 'Mengidentifikasi Standar Kompetensi dan Kualifikasi Kerja',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 39,
                'skema_id' => 4,
                'kode_unit' => 'N.78SPS02.019.2',
                'judul_unit' => 'Merencanakan Penyajian Materi Pelatihan Kerja',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 40,
                'skema_id' => 4,
                'kode_unit' => 'N.78SPS02.028.2',
            'judul_unit' => 'Melaksanakan Pelatihan tatap Muka (face to face)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 41,
                'skema_id' => 4,
                'kode_unit' => 'N.78SPS02.035.1',
            'judul_unit' => 'Menerapkan Keselamatan dan Kesehatan Kerja (K3) di Lembaga Pelatihan Kerja',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 42,
                'skema_id' => 4,
                'kode_unit' => 'N.78SPS02.061.1',
                'judul_unit' => 'Melakukan Komunikasi di Tempat Kerja',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 43,
                'skema_id' => 4,
                'kode_unit' => 'N.78SPS02.044.2',
                'judul_unit' => 'Memelihara Fasilitas Pelatihan Kerja',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 44,
                'skema_id' => 4,
                'kode_unit' => 'N.78SPS02.060.2',
            'judul_unit' => 'Memfasilitasi Pelatihan di Tempat Kerja (OJT/Pemaganagan)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 45,
                'skema_id' => 4,
                'kode_unit' => 'N.78SPS02.075.2',
                'judul_unit' => 'Menilai Kemajuan Kompetensi Peserta Pelatihan Secara Individu',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 46,
                'skema_id' => 4,
                'kode_unit' => 'N.78SPS02.078.2',
                'judul_unit' => 'Menilai Kompetensi Peserta Pelatihan di Tempat Kerja',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 47,
                'skema_id' => 5,
                'kode_unit' => 'N.78SPS02.011.1',
                'judul_unit' => 'Mengidentifikasi Standar Kompetensi dan Kualifikasi Kerja',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 48,
                'skema_id' => 5,
                'kode_unit' => 'N.78SPS02.035.1',
            'judul_unit' => 'Menerapkan Keamanan, Kesehatan, dan Keselamatan Kerja (K3) di Lembaga Pelatihan Kerja.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 49,
                'skema_id' => 5,
                'kode_unit' => 'N.78SPS02.036.1',
                'judul_unit' => 'Mengarsipkan Dokumen Lembaga Pelatihan Kerja',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 50,
                'skema_id' => 5,
                'kode_unit' => 'N.78SPS02.049.1',
                'judul_unit' => 'Mengelola Peserta Pelatihan Kerja',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 51,
                'skema_id' => 5,
                'kode_unit' => 'N.78SPS02.058.1',
                'judul_unit' => 'Menyiapkan Informasi untuk Penyelenggaraan Pelatihan Kerja',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 52,
                'skema_id' => 5,
                'kode_unit' => 'N.78SPS02.059.2',
                'judul_unit' => 'Memasarkan Program Pelatihan Kerja',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 53,
                'skema_id' => 5,
                'kode_unit' => 'N.78SPS02.061.1',
                'judul_unit' => 'Melakukan Komunikasi di Tempat Kerja',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}