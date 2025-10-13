<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SkemasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('skemas')->delete();
        
        \DB::table('skemas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'kode' => 'SKM-LSPTKI-05-2022',
                'nama' => 'Instruktur Master',
                'jenis' => 'Okupasi',
                'slug' => 'instruktur-master',
                'thumbnail' => 'skema/thumb/oyTytMm6YaBS2EEcyVVn2S7Q827Jkx7C2KatnUEi.jpg',
                'pdf_path' => NULL,
                'ringkasan' => 'Skema sertifikasi okupasi Instruktur Master adalah skema sertifikasi yang dikembangkan oleh Komite Skema LSP Trainer Kompeten Indonesia untuk memenuhi kebutuhan sertifikasi kompetensi kerja di LSP Trainer Kompeten Indonesia. Kemasan yang digunakan mengacu pada Standar Kompetensi Kerja Nasional Indonesia berdasarkan Keputusan Menteri Ketenagakerjaan Republik Indonesia No. 333 Tahun 2020 Tentang Penetapan Standar Kompetensi Kerja Nasional Indonesia Kategori Aktivitas Penyewaan dan Sewa Guna Usaha Tanpa Hak Opsi, Ketenagakerjaan, Agen Perjalanan, dan Penunjang Usaha Lainnya Golongan Pokok Aktivitas Ketenagakerjaan Bidang Standarisasi, Pelatihan Kerja, dan Sertifikasi, Keputusan Menteri Ketenagakerjaan Republik Indonesia Nomor 3 Tahun 2021 tentang Penetapan Jenjang Kualifikasi Nasional lndonesia Bidang Pelatihan Kerja dan Sertifikasi dan Keputusan Direktur Jenderal Pembinaan Pelatihan Vokasi dan Produktivitas Nomor 2/1645/LP.00.01/XII/2021 tentang Pengemasan Unit Kompetensi Bidang Pelatihan Kerja. Skema sertifikasi ini digunakan sebagai acuan pada pelaksanaan assesmen oleh Asesor kompetensi LSP Trainer Kompeten Indonesia dan memastikan kompetensi pada jabatan Instruktur Master.',
                'file_skema' => '1755658675_instruktur_master.pdf',
                'created_at' => '2025-08-19 09:40:06',
                'updated_at' => '2025-09-02 03:05:32',
            ),
            1 => 
            array (
                'id' => 2,
                'kode' => 'SKM-LSPTKI-04-2022',
                'nama' => 'Instruktur',
                'jenis' => 'Okupasi',
                'slug' => 'instruktur',
                'thumbnail' => 'skema/thumb/ZrdkoGYZpJ9fB9LidG9u8IgV5GKBrnb6dfKM10ya.jpg',
                'pdf_path' => NULL,
                'ringkasan' => 'Skema sertifikasi okupasi Instruktur adalah skema sertifikasi yang dikembangkan oleh Komite Skema LSP Trainer Kompeten Indonesia untuk memenuhi kebutuhan sertifikasi kompetensi kerja di LSP Trainer Kompeten Indonesia. Kemasan yang digunakan mengacu pada Standar Kompetensi Kerja Nasional Indonesia berdasarkan Keputusan Menteri Ketenagakerjaan Republik Indonesia No. 333 Tahun 2020 Tentang Penetapan Standar Kompetensi Kerja Nasional Indonesia Kategori Aktivitas Penyewaan dan Sewa Guna Usaha Tanpa Hak Opsi, Ketenagakerjaan, Agen Perjalanan, dan Penunjang Usaha Lainnya Golongan Pokok Aktivitas Ketenagakerjaan Bidang Standarisasi, Pelatihan Kerja, dan Sertifikasi, Keputusan Menteri Ketenagakerjaan Republik Indonesia Nomor 3 Tahun 2021 tentang Penetapan Jenjang Kualifikasi Nasional lndonesia Bidang Pelatihan Kerja dan Sertifikasi dan Keputusan Direktur Jenderal Pembinaan Pelatihan Vokasi dan Produktivitas Nomor 2/1645/LP.00.01/XII/2021 tentang Pengemasan Unit Kompetensi Bidang Pelatihan Kerja. Skema sertifikasi ini digunakan sebagai acuan pada pelaksanaan assesmen oleh Asesor kompetensi LSP Trainer Kompeten Indonesia dan memastikan kompetensi pada jabatan Instruktur.',
                'file_skema' => '1755658810_instruktur.pdf',
                'created_at' => '2025-08-19 09:40:06',
                'updated_at' => '2025-09-02 03:05:51',
            ),
            2 => 
            array (
                'id' => 3,
                'kode' => 'SKM-LSPTKI-03-2022',
                'nama' => 'Instruktur Junior',
                'jenis' => 'Okupasi',
                'slug' => 'instruktur-junior',
                'thumbnail' => 'skema/thumb/H655i6dLCu9W3fRQeSn3xaS3TrbP5D1VhsvbQB3H.jpg',
                'pdf_path' => NULL,
                'ringkasan' => 'Skema sertifikasi okupasi Instruktur Junior adalah skema sertifikasi yang dikembangkan oleh Komite Skema LSP Trainer Kompeten Indonesia untuk memenuhi kebutuhan sertifikasi kompetensi kerja di LSP Trainer Kompeten Indonesia. Kemasan yang digunakan mengacu pada Standar Kompetensi Kerja Nasional Indonesia berdasarkan Keputusan Menteri Ketenagakerjaan Republik Indonesia No. 333 Tahun 2020 Tentang Penetapan Standar Kompetensi Kerja Nasional Indonesia Kategori Aktivitas Penyewaan dan Sewa Guna Usaha Tanpa Hak Opsi, Ketenagakerjaan, Agen Perjalanan, dan Penunjang Usaha Lainnya Golongan Pokok Aktivitas Ketenagakerjaan Bidang Standarisasi, Pelatihan Kerja, dan Sertifikasi, Keputusan Menteri Ketenagakerjaan Republik Indonesia Nomor 3 Tahun 2021 tentang Penetapan Jenjang Kualifikasi Nasional lndonesia Bidang Pelatihan Kerja dan Sertifikasi dan Keputusan Direktur Jenderal Pembinaan Pelatihan Vokasi dan Produktivitas Nomor 2/1645/LP.00.01/XII/2021 tentang Pengemasan Unit Kompetensi Bidang Pelatihan Kerja. Skema sertifikasi ini digunakan sebagai acuan pada pelaksanaan assesmen oleh Asesor kompetensi LSP Trainer Kompeten Indonesia dan memastikan kompetensi pada jabatan Instruktur Junior.',
                'file_skema' => '1755658844_instruktur_junior.pdf',
                'created_at' => '2025-08-19 09:40:06',
                'updated_at' => '2025-09-02 03:06:09',
            ),
            3 => 
            array (
                'id' => 4,
                'kode' => 'SKM-LSPTKI-02-2022',
                'nama' => 'Pelatih di Tempat Kerja',
                'jenis' => 'Okupasi',
                'slug' => 'pelatih-di-tempat-kerja',
                'thumbnail' => 'skema/thumb/sJypOsvTZ8tA1NP0jeGazoYN6v5L7a13Ozp1H5ww.jpg',
                'pdf_path' => NULL,
                'ringkasan' => 'Skema sertifikasi okupasi Pelatih di Tempat Kerja adalah skema sertifikasi yang dikembangkan oleh Komite Skema LSP Trainer Kompeten Indonesia untuk memenuhi kebutuhan sertifikasi kompetensi kerja di LSP Trainer Kompeten Indonesia. Kemasan yang digunakan mengacu pada Standar Kompetensi Kerja Nasional Indonesia berdasarkan Keputusan Menteri Ketenagakerjaan Republik Indonesia No. 333 Tahun 2020 Tentang Penetapan Standar Kompetensi Kerja Nasional Indonesia Kategori Aktivitas Penyewaan dan Sewa Guna Usaha Tanpa Hak Opsi, Ketenagakerjaan, Agen Perjalanan, dan Penunjang Usaha Lainnya Golongan Pokok Aktivitas Ketenagakerjaan Bidang Standarisasi, Pelatihan Kerja, dan Sertifikasi, Keputusan Menteri Ketenagakerjaan Republik Indonesia Nomor 3 Tahun 2021 tentang Penetapan Jenjang Kualifikasi Nasional lndonesia Bidang Pelatihan Kerja dan Sertifikasi dan Keputusan Direktur Jenderal Pembinaan Pelatihan Vokasi dan Produktivitas Nomor 2/1645/LP.00.01/XII/2021 tentang Pengemasan Unit Kompetensi Bidang Pelatihan Kerja. Skema sertifikasi ini digunakan sebagai acuan pada pelaksanaan assesmen oleh Asesor kompetensi LSP Trainer Kompeten Indonesia dan memastikan kompetensi pada jabatan Pelatih di Tempat Kerja.',
                'file_skema' => '1755658875_pelatih_di_tempat_kerja.pdf',
                'created_at' => '2025-08-19 09:40:06',
                'updated_at' => '2025-09-02 03:06:28',
            ),
            4 => 
            array (
                'id' => 5,
                'kode' => 'SKM-LSPTKI-06-2022',
                'nama' => 'Penyelenggara Pelatihan',
                'jenis' => 'Okupasi',
                'slug' => 'penyelenggara-pelatihan',
                'thumbnail' => 'skema/thumb/kpvfhS7mFeZk9Wrx5hDdGwZ8Uoro1ArzOXuTeowQ.jpg',
                'pdf_path' => NULL,
                'ringkasan' => 'Skema sertifikasi okupasi Penyelenggara Pelatihan adalah skema sertifikasi yang dikembangkan oleh Komite Skema LSP Trainer Kompeten Indonesia untuk memenuhi kebutuhan sertifikasi kompetensi kerja di LSP Trainer Kompeten Indonesia. Kemasan yang digunakan mengacu pada Standar Kompetensi Kerja Nasional Indonesia berdasarkan Keputusan Menteri Ketenagakerjaan Republik Indonesia No. 333 Tahun 2020 Tentang Penetapan Standar Kompetensi Kerja Nasional Indonesia Kategori Aktivitas Penyewaan dan Sewa Guna Usaha Tanpa Hak Opsi, Ketenagakerjaan, Agen Perjalanan, dan Penunjang Usaha Lainnya Golongan Pokok Aktivitas Ketenagakerjaan Bidang Standarisasi, Pelatihan Kerja, dan Sertifikasi, Keputusan Menteri Ketenagakerjaan Republik Indonesia Nomor 3 Tahun 2021 tentang Penetapan Jenjang Kualifikasi Nasional lndonesia Bidang Pelatihan Kerja dan Sertifikasi dan Keputusan Direktur Jenderal Pembinaan Pelatihan Vokasi dan Produktivitas Nomor 2/1645/LP.00.01/XII/2021 tentang Pengemasan Unit Kompetensi Bidang Pelatihan Kerja. Skema sertifikasi ini digunakan sebagai acuan pada pelaksanaan assesmen oleh Asesor kompetensi LSP Trainer Kompeten Indonesia dan memastikan kompetensi pada jabatan Penyelenggara Pelatihan.',
                'file_skema' => '1755658904_penyelenggara_pelatihan.pdf',
                'created_at' => '2025-08-19 09:40:06',
                'updated_at' => '2025-09-02 03:06:50',
            ),
        ));
        
        
        
    }
}