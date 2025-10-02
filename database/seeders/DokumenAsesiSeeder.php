<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DokumenAsesi;

class DokumenAsesiSeeder extends Seeder
{
    public function run()
    {
        DokumenAsesi::updateOrCreate(
            ['user_id' => 4], // hanya user dengan id 4
            [
                'foto' => 'dokumen/foto/foto_dummy.jpg',
                'ktp_sim_paspor' => 'dokumen/identitas/ktp_dummy.pdf',
                'ijazah' => 'dokumen/ijazah/ijazah_dummy.pdf',
                'sertifikat' => 'dokumen/sertifikat/sertifikat_dummy.pdf',
                'cv' => 'dokumen/cv/cv_dummy.pdf',
                'tanda_tangan' => 'dokumen/ttd/ttd_dummy.png',
            ]
        );
    }
}
