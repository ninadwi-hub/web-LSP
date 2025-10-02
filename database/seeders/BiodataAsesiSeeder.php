<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BiodataAsesi;

class BiodataAsesiSeeder extends Seeder
{
    public function run()
    {
        BiodataAsesi::updateOrCreate(
            ['user_id' => 4], // hanya user dengan id 4
            [
                'no_hp' => '081234567890',
                'jenis_kelamin' => 'Perempuan',
                'kewarganegaraan' => 'Indonesia',
                'no_identitas' => '1234567890123456',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '2000-01-01',
                'organisasi' => 'Contoh Organisasi',
                'alamat' => 'Jl. Contoh No.1, Bandung',
                'provinsi' => 'Jawa Barat',
                'kabupaten' => 'Bandung',
                'pendidikan' => 'S1',
                'nama_perguruan_tinggi' => 'Universitas Contoh',
                'program_studi' => 'Teknik Informatika',
                'pekerjaan' => 'Karyawan',
                'nama_perusahaan' => 'PT Contoh',
                'alamat_perusahaan' => 'Jl. Contoh Perusahaan No.2',
                'no_telp_perusahaan' => '0221234567',
                'email_perusahaan' => 'hrd@contoh.com',
                'jabatan_perusahaan' => 'Staff IT',
            ]
        );
    }
}
