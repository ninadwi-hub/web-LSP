<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PendaftaranAsesmenSeeder extends Seeder
{
    public function run(): void
    {
        $biodata = DB::table('biodata_asesi')->pluck('id');
        $dokumen = DB::table('dokumen_asesi')->pluck('id');
        $jadwal  = DB::table('jadwal_asesmens')->pluck('id'); // kalau ada tabel jadwal

        if ($biodata->isEmpty()) {
            $this->command->warn('❗ Tidak ada data di tabel biodata_asesi, seeder dilewati.');
            return;
        }

        DB::table('pendaftaran_asesmens')->insert([
            [
                'biodata_asesi_id' => $biodata[0],
                'dokumen_asesi_id' => $dokumen->first() ?? null,
                'jadwal_id' => $jadwal->first() ?? null,
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
                'created_at' => '2025-10-16 03:32:23',
                'updated_at' => '2025-10-16 05:21:42',
            ],
            [
                'biodata_asesi_id' => $biodata->count() > 1 ? $biodata[0] : $biodata[0],
                'dokumen_asesi_id' => $dokumen->count() > 1 ? $dokumen[0] : $dokumen->first(),
                'jadwal_id' => $jadwal->count() > 1 ? $jadwal[0] : $jadwal->first(),
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
                'created_at' => '2025-10-16 04:18:35',
                'updated_at' => '2025-10-20 01:40:05',
            ],
            [
                'biodata_asesi_id' => $biodata[0],
                'dokumen_asesi_id' => $dokumen->first() ?? null,
                'jadwal_id' => 9, // sesuai data contoh kamu
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
                'created_at' => '2025-10-20 04:37:37',
                'updated_at' => '2025-10-20 04:37:37',
            ],
            [
                'biodata_asesi_id' => $biodata->count() > 1 ? $biodata[1] : $biodata[0],
                'dokumen_asesi_id' => $dokumen->count() > 1 ? $dokumen[1] : $dokumen->first(),
                'jadwal_id' => 9,
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
                'created_at' => '2025-10-20 07:45:57',
                'updated_at' => '2025-10-20 07:45:57',
            ],
        ]);
    }
}
