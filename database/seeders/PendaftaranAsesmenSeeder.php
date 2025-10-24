<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PendaftaranAsesmenSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil data yang sudah ada
        $biodata = DB::table('biodata_asesi')->pluck('id');
        $dokumen = DB::table('dokumen_asesi')->pluck('id');
        $jadwal  = DB::table('jadwal_asesmens')->pluck('id');

        if ($biodata->isEmpty()) {
            $this->command->warn('❗ Tidak ada data di tabel biodata_asesi, seeder dilewati.');
            return;
        }

        if ($jadwal->isEmpty()) {
            $this->command->warn('❗ Tidak ada data di tabel jadwal_asesmens, seeder dilewati.');
            return;
        }

        // Hapus data lama (opsional) — gunakan delete() supaya aman
        DB::table('pendaftaran_asesmens')->delete();


        // Data pendaftaran
        $data = [
            [
                'biodata_asesi_id' => $biodata->first(),
                'dokumen_asesi_id' => $dokumen->first() ?? null,
                'jadwal_id' => $jadwal->first(),
                'tujuan_asesmen' => 'Lainnya',
                'tuk' => 'rumah',
                'jadwal_uji' => '2025-10-16',
                'metode_uji' => null,
                'keterangan_teknis' => null,
                'jumlah_pembayaran' => 1200000.00,
                'sumber_pendanaan' => 'Mandiri',
                'metode_pembayaran' => 'Transfer Bank',
                'no_rekening' => '0000xxxx',
                'nama_rekening' => 'nina',
                'tanggal_pembayaran' => '2025-10-16',
                'bukti_pembayaran' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'biodata_asesi_id' => $biodata->get(1) ?? $biodata->first(),
                'dokumen_asesi_id' => $dokumen->get(1) ?? $dokumen->first(),
                'jadwal_id' => $jadwal->get(1) ?? $jadwal->first(),
                'tujuan_asesmen' => 'Rekognisi Pembelajaran Lampau (RPL)',
                'tuk' => 'TUK Sewaktu Acarya Sinergi Teknodukasi',
                'jadwal_uji' => '2025-10-20',
                'metode_uji' => null,
                'keterangan_teknis' => null,
                'jumlah_pembayaran' => 1200000.00,
                'sumber_pendanaan' => null,
                'metode_pembayaran' => null,
                'no_rekening' => '0000xxxx',
                'nama_rekening' => null,
                'tanggal_pembayaran' => null,
                'bukti_pembayaran' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'biodata_asesi_id' => $biodata->get(2) ?? $biodata->first(),
                'dokumen_asesi_id' => $dokumen->get(2) ?? $dokumen->first(),
                'jadwal_id' => $jadwal->get(2) ?? $jadwal->first(),
                'tujuan_asesmen' => 'Sertifikasi',
                'tuk' => 'TUK Sinergi Gaya Potenza Indonesia',
                'jadwal_uji' => '2025-10-20',
                'metode_uji' => null,
                'keterangan_teknis' => null,
                'jumlah_pembayaran' => 1000.00,
                'sumber_pendanaan' => 'Lain-lain',
                'metode_pembayaran' => 'Tunai',
                'no_rekening' => '0000xxxx',
                'nama_rekening' => 'saya',
                'tanggal_pembayaran' => '2025-10-20',
                'bukti_pembayaran' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'biodata_asesi_id' => $biodata->get(3) ?? $biodata->first(),
                'dokumen_asesi_id' => $dokumen->get(3) ?? $dokumen->first(),
                'jadwal_id' => $jadwal->get(3) ?? $jadwal->first(),
                'tujuan_asesmen' => 'Rekognisi Pembelajaran Lampau (RPL)',
                'tuk' => 'TUK Sewaktu @Hom Premiere Timoho',
                'jadwal_uji' => '2025-10-20',
                'metode_uji' => null,
                'keterangan_teknis' => null,
                'jumlah_pembayaran' => null,
                'sumber_pendanaan' => null,
                'metode_pembayaran' => null,
                'no_rekening' => null,
                'nama_rekening' => null,
                'tanggal_pembayaran' => null,
                'bukti_pembayaran' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('pendaftaran_asesmens')->insert($data);

        $this->command->info('✅ Seeder pendaftaran_asesmens selesai.');
    }
}
