<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UnitKompetensi;
use App\Models\Skema;

class UnitKompetensisTableSeeder extends Seeder
{
    public function run()
    {
        // Ambil ID skema berdasarkan kode
        $skemaIJ   = Skema::where('kode', 'IJ')->first()?->id;
        $skemaPP   = Skema::where('kode', 'PP')->first()?->id;
        $skemaPLK  = Skema::where('kode', 'PLK')->first()?->id;
        $skemaPPTK = Skema::where('kode', 'PP-TK')->first()?->id;

        $units = [
            // Skema IJ
            ['kode_unit' => 'N.78SPS02.009.2', 'judul_unit' => 'Menentukan Kebutuhan Pelatihan Mikro', 'skema_id' => $skemaIJ],
            ['kode_unit' => 'N.78SPS02.013.1', 'judul_unit' => 'Menyusun Rencana Bisnis', 'skema_id' => $skemaIJ],
            ['kode_unit' => 'N.78SPS02.014.2', 'judul_unit' => 'Merencanakan Strategi Pemasaran Pelatihan Kerja', 'skema_id' => $skemaIJ],
            ['kode_unit' => 'N.78SPS02.016.1', 'judul_unit' => 'Merancang Platform E-learning', 'skema_id' => $skemaIJ],
            ['kode_unit' => 'N.78SPS02.027.2', 'judul_unit' => 'Mengembangkan Jejaring Kerjasama Kemitraan Antar Lembaga/Perusahaan', 'skema_id' => $skemaIJ],
            ['kode_unit' => 'N.78SPS02.030.1', 'judul_unit' => 'Memfasilitasi E-learning', 'skema_id' => $skemaIJ],
            ['kode_unit' => 'N.78SPS02.033.1', 'judul_unit' => 'Melakukan Negosiasi dengan Mitra Lembaga Pelatihan Kerja', 'skema_id' => $skemaIJ],
            ['kode_unit' => 'N.78SPS02.059.2', 'judul_unit' => 'Memasarkan Program Pelatihan Kerja', 'skema_id' => $skemaIJ],
            ['kode_unit' => 'N.78SPS01.001.2', 'judul_unit' => 'Membuat Peta Kompetensi', 'skema_id' => $skemaIJ],
            ['kode_unit' => 'N.78SPS01.003.2', 'judul_unit' => 'Merumuskan Standar Kompetensi', 'skema_id' => $skemaIJ],
            ['kode_unit' => 'N.78SPS02.008.2', 'judul_unit' => 'Menentukan Kebutuhan Pelatihan Makro', 'skema_id' => $skemaIJ],
            ['kode_unit' => 'N.78SPS02.023.1', 'judul_unit' => 'Mengembangkan Program Pelatihan Kerja', 'skema_id' => $skemaIJ],
            ['kode_unit' => 'N.78SPS02.084.2', 'judul_unit' => 'Mengevaluasi Pelaksanaan Suatu Program Pelatihan Kerja', 'skema_id' => $skemaIJ],
            ['kode_unit' => 'N.78SPS02.086.2', 'judul_unit' => 'Mengevaluasi Biaya Suatu Program Pelatihan Kerja', 'skema_id' => $skemaIJ],

            // Skema PP
            ['kode_unit' => 'N.78SPS02.012.2', 'judul_unit' => 'Menyusun program Pelatihan Kerja', 'skema_id' => $skemaPP],
            ['kode_unit' => 'N.78SPS02.019.2', 'judul_unit' => 'Merencanakan Penyajian Materi Pelatihan Kerja', 'skema_id' => $skemaPP],
            ['kode_unit' => 'N.78SPS02.022.1', 'judul_unit' => 'Merencanakan Evaluasi Hasil Pembelajaran', 'skema_id' => $skemaPP],
            ['kode_unit' => 'N.78SPS02.028.2', 'judul_unit' => 'Melaksanakan Pelatihan Tatap Muka (face to face)', 'skema_id' => $skemaPP],
            ['kode_unit' => 'N.78SPS02.035.1', 'judul_unit' => 'Menerapkan Keselamatan dan Kesehatan Kerja (K3) di Lembaga Pelatihan Kerja', 'skema_id' => $skemaPP],
            ['kode_unit' => 'N.78SPS02.038.1', 'judul_unit' => 'Mengelola Pemenuhan Persyaratan Bahasa, Literasi, dan Berhitung dalam Proses Pembelajaran', 'skema_id' => $skemaPP],
            ['kode_unit' => 'N.78SPS02.075.1', 'judul_unit' => 'Menilai Kemajuan Kompetensi Peserta Pelatihan Secara Individu', 'skema_id' => $skemaPP],
            ['kode_unit' => 'N.78SPS02.010.2', 'judul_unit' => 'Menentukan Kebutuhan Pelatihan Individu', 'skema_id' => $skemaPP],
            ['kode_unit' => 'N.78SPS02.015.1', 'judul_unit' => 'Merancang Strategi Pembelajaran', 'skema_id' => $skemaPP],
            ['kode_unit' => 'N.78SPS02.039.2', 'judul_unit' => 'Mengelola Bahan Pelatihan Kerja', 'skema_id' => $skemaPP],
            ['kode_unit' => 'N.78SPS02.041.2', 'judul_unit' => 'Mengelola Peralatan Pelatihan Kerja', 'skema_id' => $skemaPP],
            ['kode_unit' => 'N.78SPS02.063.1', 'judul_unit' => 'Menyiapkan Pelaksanaan Pelatihan atau Asesmen Berbasis Kompetensi', 'skema_id' => $skemaPP],
            ['kode_unit' => 'N.78SPS02.064.1', 'judul_unit' => 'Melaksanakan Pelatihan Berbasis Kompetensi (PBK)', 'skema_id' => $skemaPP],
            ['kode_unit' => 'N.78SPS02.068.1', 'judul_unit' => 'Melakukan Asesmen Berbasis Kompetensi', 'skema_id' => $skemaPP],

            // Skema PLK
            ['kode_unit' => 'N.78SPS02.011.1', 'judul_unit' => 'Mengidentifikasi Standar Kompetensi dan Kualifikasi Kerja', 'skema_id' => $skemaPLK],
            ['kode_unit' => 'N.78SPS02.019.2', 'judul_unit' => 'Merencanakan Penyajian Materi Pelatihan Kerja', 'skema_id' => $skemaPLK],
            ['kode_unit' => 'N.78SPS02.028.2', 'judul_unit' => 'Melaksanakan Pelatihan Tatap Muka (face to face)', 'skema_id' => $skemaPLK],
            ['kode_unit' => 'N.78SPS02.035.1', 'judul_unit' => 'Menerapkan Keselamatan dan Kesehatan Kerja (K3) di Lembaga Pelatihan Kerja', 'skema_id' => $skemaPLK],
            ['kode_unit' => 'N.78SPS02.061.1', 'judul_unit' => 'Melakukan Komunikasi di Tempat Kerja', 'skema_id' => $skemaPLK],
            ['kode_unit' => 'N.78SPS02.039.2', 'judul_unit' => 'Mengelola Bahan Pelatihan Kerja', 'skema_id' => $skemaPLK],
            ['kode_unit' => 'N.78SPS02.041.2', 'judul_unit' => 'Mengelola Peralatan Pelatihan Kerja', 'skema_id' => $skemaPLK],
            ['kode_unit' => 'N.78SPS02.044.1', 'judul_unit' => 'Memelihara Fasilitas Pelatihan Kerja', 'skema_id' => $skemaPLK],
            ['kode_unit' => 'N.78SPS02.075.1', 'judul_unit' => 'Menilai Kemajuan Kompetensi Peserta Pelatihan Secara Individu', 'skema_id' => $skemaPLK],

            // Skema PP-TK
            ['kode_unit' => 'N.78SPS02.011.1', 'judul_unit' => 'Mengidentifikasi Standar Kompetensi dan Kualifikasi Kerja', 'skema_id' => $skemaPPTK],
            ['kode_unit' => 'N.78SPS02.019.2', 'judul_unit' => 'Merencanakan Penyajian Materi Pelatihan Kerja', 'skema_id' => $skemaPPTK],
            ['kode_unit' => 'N.78SPS02.028.2', 'judul_unit' => 'Melaksanakan Pelatihan Tatap Muka (face to face)', 'skema_id' => $skemaPPTK],
            ['kode_unit' => 'N.78SPS02.035.1', 'judul_unit' => 'Menerapkan Keselamatan dan Kesehatan Kerja (K3) di Lembaga Pelatihan Kerja', 'skema_id' => $skemaPPTK],
            ['kode_unit' => 'N.78SPS02.061.1', 'judul_unit' => 'Melakukan Komunikasi di Tempat Kerja', 'skema_id' => $skemaPPTK],
            ['kode_unit' => 'N.78SPS02.044.2', 'judul_unit' => 'Memelihara Fasilitas Pelatihan Kerja', 'skema_id' => $skemaPPTK],
            ['kode_unit' => 'N.78SPS02.060.2', 'judul_unit' => 'Memfasilitasi Pelatihan di Tempat Kerja (OJT/Pemagangan)', 'skema_id' => $skemaPPTK],
            ['kode_unit' => 'N.78SPS02.075.2', 'judul_unit' => 'Menilai Kemajuan Kompetensi Peserta Pelatihan Secara Individu', 'skema_id' => $skemaPPTK],
            ['kode_unit' => 'N.78SPS02.078.2', 'judul_unit' => 'Menilai Kompetensi Peserta Pelatihan di Tempat Kerja', 'skema_id' => $skemaPPTK],

            // Tambahan skema lain (misal kode baru)
            ['kode_unit' => 'N.78SPS02.011.1', 'judul_unit' => 'Mengidentifikasi Standar Kompetensi dan Kualifikasi Kerja', 'skema_id' => $skemaPP],
            ['kode_unit' => 'N.78SPS02.035.1', 'judul_unit' => 'Menerapkan Keamanan, Kesehatan, dan Keselamatan Kerja (K3) di Lembaga Pelatihan Kerja.', 'skema_id' => $skemaPP],
            ['kode_unit' => 'N.78SPS02.036.1', 'judul_unit' => 'Mengarsipkan Dokumen Lembaga Pelatihan Kerja', 'skema_id' => $skemaPP],
            ['kode_unit' => 'N.78SPS02.049.1', 'judul_unit' => 'Mengelola Peserta Pelatihan Kerja', 'skema_id' => $skemaPP],
            ['kode_unit' => 'N.78SPS02.058.1', 'judul_unit' => 'Menyiapkan Informasi untuk Penyelenggaraan Pelatihan Kerja', 'skema_id' => $skemaPP],
            ['kode_unit' => 'N.78SPS02.059.2', 'judul_unit' => 'Memasarkan Program Pelatihan Kerja', 'skema_id' => $skemaPP],
            ['kode_unit' => 'N.78SPS02.061.1', 'judul_unit' => 'Melakukan Komunikasi di Tempat Kerja', 'skema_id' => $skemaPP],
        ];

        foreach ($units as $unit) {
            UnitKompetensi::updateOrCreate(
                ['kode_unit' => $unit['kode_unit'], 'skema_id' => $unit['skema_id']],
                $unit
            );
        }

        $this->command->info('Unit Kompetensi berhasil di-seed: ' . count($units) . ' data');
    }
}
