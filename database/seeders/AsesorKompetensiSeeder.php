<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AsesorKompetensi;

class AsesorKompetensiSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['no_registrasi' => 'MET.000.008687 2024', 'nama' => 'Uton Wartono', 'email' => 'utonwartono65@gmail.com', 'hp' => '082216616543', 'tgl_expired' => '2025-05-22', 'username' => 'utonwartono65@gmail.com'],
            ['no_registrasi' => 'MET.000.008689 2024', 'nama' => 'Wakhida Nurhayati', 'email' => 'wakhida.ayasophia@gmail.com', 'hp' => '081380993677', 'tgl_expired' => '2025-05-22', 'username' => 'wakhida.ayasophia@gmail.com'],
            ['no_registrasi' => 'MET.000.008675 2024', 'nama' => 'Suyatno', 'email' => 'suyatnos296@gmail.com', 'hp' => '085247116525', 'tgl_expired' => '2025-05-22', 'username' => 'suyatnos296@gmail.com'],
            ['no_registrasi' => 'MET.000.002627 2022', 'nama' => 'Ade Rupawan', 'email' => 'ade.rupawan@gmail.com', 'hp' => '081234567', 'tgl_expired' => '2025-12-31', 'username' => 'ade.rupawan@gmail.com'],
            ['no_registrasi' => 'MET.000.002648 2022', 'nama' => 'Adi Soeprapto', 'email' => 'adisoepra@gmail.com', 'hp' => '081327063231', 'tgl_expired' => null, 'username' => 'adisoepra@gmail.com'],
            ['no_registrasi' => 'MET.000.002637 2022', 'nama' => 'Agus Sudiyar Tanjung', 'email' => 'agussudiyartanjung@gmail.com', 'hp' => '08119403388', 'tgl_expired' => '2025-04-12', 'username' => 'AGUSSUDIYARTANJUNG@GMAIL.COM'],
            ['no_registrasi' => 'MET.000.007108 2015', 'nama' => 'Moch Aminudin Hadi', 'email' => 'aminudinhadi@gmail.com', 'hp' => '0819819001', 'tgl_expired' => null, 'username' => 'aminudinhadi@gmail.com'],
            ['no_registrasi' => 'MET.000.008680 2024', 'nama' => 'Bayu Kurniawan', 'email' => 'bayu2kurniawan@gmail.com', 'hp' => '62 813-2612-9996', 'tgl_expired' => null, 'username' => 'bayu2kurniawan@gmail.com'],
            ['no_registrasi' => 'MET.000.002641 2022', 'nama' => 'Berlian Aniek Herlina', 'email' => 'berlian_dr@yahoo.co.id', 'hp' => '081249806320', 'tgl_expired' => null, 'username' => 'berlian_dr@yahoo.co.id'],
            ['no_registrasi' => 'MET.000.002630 2022', 'nama' => 'Runny Yuliasari', 'email' => 'bundarunny@gmail.com', 'hp' => '082113200797', 'tgl_expired' => null, 'username' => 'bundarunny@gmail.com'],
            ['no_registrasi' => 'MET.000.002635 2022', 'nama' => 'Saptawati', 'email' => 'ummu.hilyah06@gmail.com', 'hp' => '08111901168', 'tgl_expired' => null, 'username' => 'ummu.hilyah06@gmail.com'],
            ['no_registrasi' => 'MET.000.002628 2022', 'nama' => 'Satrya Yudha Wibowo', 'email' => 'satryasywibowo@gmail.com', 'hp' => '081263746772', 'tgl_expired' => null, 'username' => 'satryasywibowo@gmail.com'],
            ['no_registrasi' => 'MET 000.002194 2021', 'nama' => 'Tin Dels Marce Ndawu', 'email' => 'noniellen7@gmail.com', 'hp' => '082243591114', 'tgl_expired' => null, 'username' => 'noniellen7@gmail.com'],
            ['no_registrasi' => 'MET.000.003710 2020', 'nama' => 'Marte Lusiati', 'email' => 'martelusiati@gmail.com', 'hp' => '0819806140', 'tgl_expired' => null, 'username' => 'martelusiati@gmail.com'],
            ['no_registrasi' => 'MET.000.003699 2020', 'nama' => 'Moh. Badaruddin Hadi', 'email' => 'mohbadaruddinhadi@gmail.com', 'hp' => '081364715451', 'tgl_expired' => '2023-11-09', 'username' => 'badarudin'],
            ['no_registrasi' => 'MET.000.002640 2022', 'nama' => 'Emmy Junianti', 'email' => 'emmy.syahrodji76@gmail.com', 'hp' => '081289434000', 'tgl_expired' => '2025-04-12', 'username' => 'emmy.syahrodji76@gmail.com'],
            ['no_registrasi' => 'MET.000.002626 2022', 'nama' => 'Retno Astuti Wulandari', 'email' => 'wulan.gie@yahoo.com', 'hp' => '081270110077', 'tgl_expired' => '2025-04-12', 'username' => 'wulan.gie@yahoo.com'],
            ['no_registrasi' => 'MET.000.002625 2022', 'nama' => 'Minarni Anita Romaida Gultom', 'email' => 'gultom.ag@gmail.com', 'hp' => '08127072808', 'tgl_expired' => '2025-04-12', 'username' => 'gultom.ag@gmail.com'],
            ['no_registrasi' => 'MET.000.000500 2015', 'nama' => 'Vittria Tattiana, S.Psi', 'email' => 'vittria.ipiet@gmail.com', 'hp' => '0811-884-469', 'tgl_expired' => null, 'username' => 'vittria.ipiet@gmail.com'],
            ['no_registrasi' => 'MET.000.016496 2019', 'nama' => 'Cahyo Budi Santoso', 'email' => 'cafana07@gmail.com', 'hp' => '+62 813-2535-9804', 'tgl_expired' => null, 'username' => 'cafana'],
            ['no_registrasi' => 'MET.000.005650 2017', 'nama' => 'Triyono Suryoning Putro', 'email' => 'triyonosuryoputro@gmail.com', 'hp' => '0811-2788-336', 'tgl_expired' => null, 'username' => 'triyonosuryoputro@gmail.com'],
            ['no_registrasi' => 'MET.000.008693 2024', 'nama' => 'Untung Subagyo', 'email' => 'untungsubagyo@gmail.com', 'hp' => '081227009435', 'tgl_expired' => null, 'username' => 'untungsubagyo'],
            ['no_registrasi' => 'MET.000.008679 2024', 'nama' => 'Muhammad Yusuf Abdurrahman', 'email' => 'yusuf@gmail.com', 'hp' => null, 'tgl_expired' => null, 'username' => 'yusuf'],
            ['no_registrasi' => 'MET.000.008682 2024', 'nama' => 'Mitha Evi Rahmadhona', 'email' => 'Thamitha4@gmail.com', 'hp' => '081278616111', 'tgl_expired' => null, 'username' => 'Thamitha4@gmail.com'],
            ['no_registrasi' => 'MET.000.008677 2024', 'nama' => 'Lina Nur Hidayati', 'email' => 'hidayati.lina@gmail.com', 'hp' => '08123', 'tgl_expired' => null, 'username' => 'hidayati.lina@gmail.com'],
            ['no_registrasi' => 'MET.000.008686 2024', 'nama' => 'Dianne Dear', 'email' => 'diannedear@gmail.com', 'hp' => '081254508319', 'tgl_expired' => null, 'username' => 'diannedear@gmail.com'],
            ['no_registrasi' => 'MET.000.008685 2024', 'nama' => 'Rita Hastuti', 'email' => 'rita.upi.hastuti@gmail.com', 'hp' => '08129405723', 'tgl_expired' => null, 'username' => 'rita.upi.hastuti@gmail.com'],
            ['no_registrasi' => 'MET.000.002625 2016', 'nama' => 'Masduki Asbari', 'email' => 'kangmasduki.ssi@gmail.com', 'hp' => '08119741010', 'tgl_expired' => null, 'username' => 'kangmasduki.ssi@gmail.com'],
        ];

        foreach ($data as $asesor) {
            AsesorKompetensi::updateOrCreate(['no_registrasi' => $asesor['no_registrasi']], $asesor);
        }
    }
}