<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JadwalAsesmen;
use App\Models\Skema;
use App\Models\User;
use Carbon\Carbon;

class JadwalAsesmenSeeder extends Seeder
{
    public function run()
    {
        $skemas = Skema::all();
        $asesors = User::where('role', 'asesor')->get();

        if ($skemas->isEmpty() || $asesors->count() < 4) {
            $this->command->warn('Pastikan sudah menjalankan SkemaSeeder dan AsesorSeeder terlebih dahulu!');
            return;
        }

        $jadwals = [
            [
                'no_sk' => '100/LSP-TKI/PPHU/IX/2025',
                'tgl_terbit_sk' => Carbon::parse('2025-09-24'),
                'tanggal_asesmen' => Carbon::parse('2025-09-26'),
                'skema_id' => $skemas->where('kode', 'IJ')->first()->id,
                'tipe' => 'Nirkertas',
                'harga' => 1500000,
                'kuota' => 25,
            ],
            [
                'no_sk' => '19/LSPTKI/PP/2025',
                'tgl_terbit_sk' => Carbon::parse('2025-09-23'),
                'tanggal_asesmen' => Carbon::parse('2025-09-30'),
                'skema_id' => $skemas->where('kode', 'PP')->first()->id,
                'tipe' => 'Nirkertas',
                'harga' => 1500000,
                'kuota' => 10,
            ],
            [
                'no_sk' => '010/HUK/LSPTKI/VI/2025',
                'tgl_terbit_sk' => Carbon::parse('2025-08-13'),
                'tanggal_asesmen' => Carbon::parse('2025-08-22'),
                'skema_id' => $skemas->where('kode', 'IJ')->first()->id,
                'tipe' => 'Nirkertas',
                'harga' => 1500000,
                'kuota' => 5,
            ],
            [
                'no_sk' => '042/SK/LSP-TKI/PPUK/VIII/2025',
                'tgl_terbit_sk' => Carbon::parse('2025-08-15'),
                'tanggal_asesmen' => Carbon::parse('2025-08-13'),
                'skema_id' => $skemas->where('kode', 'PP')->first()->id,
                'tipe' => 'SJJ',
                'harga' => 500000,
                'kuota' => 7,
            ],
        ];

        foreach ($jadwals as $index => $jadwalData) {
            $jadwal = JadwalAsesmen::create($jadwalData);

            // Attach Asesor Uji (3-4 orang, pertama sebagai lead)
            $asesorUji = $asesors->random(rand(3, 4));
            foreach ($asesorUji as $idx => $asesor) {
                $jadwal->asesorUji()->attach($asesor->id, [
                    'role' => 'uji',
                    'is_lead' => $idx === 0, // Pertama sebagai lead
                ]);
            }

            // Attach Asesor Validator (1-2 orang, pertama sebagai lead)
            $asesorValidator = $asesors->whereNotIn('id', $asesorUji->pluck('id'))->random(rand(1, 2));
            foreach ($asesorValidator as $idx => $asesor) {
                $jadwal->asesorValidator()->attach($asesor->id, [
                    'role' => 'validator',
                    'is_lead' => $idx === 0, // Pertama sebagai lead
                ]);
            }

            $this->command->info("Jadwal #{$jadwal->id} berhasil dibuat dengan asesor");
        }
    }
}