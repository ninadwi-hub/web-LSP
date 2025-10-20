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

        if ($biodata->isEmpty()) {
            $this->command->warn('❗ Tidak ada data di tabel biodata_asesi, seeder dilewati.');
            return;
        }

        DB::table('pendaftaran_asesmens')->insert([
            [
                'biodata_asesi_id' => $biodata[0], // ambil id pertama
                'dokumen_asesi_id' => $dokumen->first() ?? null,
                'tujuan_asesmen' => 'Sertifikasi',
                'tuk' => 'SMK Negeri 1 Bandung',
                'jadwal_uji' => '2025-11-10',
                'metode_uji' => 'Offline',
                'keterangan_teknis' => 'Peserta akan diuji secara langsung di laboratorium RPL.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'biodata_asesi_id' => $biodata->count() > 1 ? $biodata[1] : $biodata[0],
                'dokumen_asesi_id' => $dokumen->count() > 1 ? $dokumen[1] : $dokumen->first(),
                'tujuan_asesmen' => 'RPL',
                'tuk' => 'SMK Negeri 2 Bandung',
                'jadwal_uji' => '2025-12-01',
                'metode_uji' => 'Online',
                'keterangan_teknis' => 'Asesmen dilakukan melalui Google Meet.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
