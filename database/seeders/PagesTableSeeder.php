<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pages')->delete();
        
        \DB::table('pages')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'FAQ',
                'slug' => 'faq',
            'content' => '<h2>FREQUENTLY ASKED QUESTIONS</h2><ul><li><p>Apa itu Sertifikasi Kompetensi Kerja?&nbsp;</p><p>Sertifikasi kompetensi kerja merupakan serangkaian proses pemberian sertifikat kompetensi yang dilakukan secara sistematis dan obyektif melalui uji kompetensi yang mengacu kepada standar kompetensi kerja nasional Indonesia, standar internasional dan/atau standar khusus.</p></li><li><p>Siapa yang Menerbitkan Sertifikasi Kompetensi Kerja?&nbsp;</p><p>Sertifikat kompetensi kerja yang berlaku di Indonesia hanya diterbitkan atas nama Badan Nasional Sertifikasi Profesi (BNSP). Pelaksanaan sertifikasinya dapat dilaksanakan oleh Lembaga Sertifikasi Profesi yang telah mendapatkan lisensi dari BNSP, termasuk LSP Trainer Kompeten Indonesia.</p></li><li><p>Apa Bedanya Dengan Sertifikat Training?&nbsp;</p><p><strong>Perbedaan 1:</strong> Sertifikat training diberikan setelah pelaksanaan training dan menyatakan bahwa peserta telah berhasil mengikuti suatu training tertentu. Sertifikat kompetensi kerja adalah bentuk pernyataan bahwa seseorang kompeten di bidang tertentu sesuai dengan standar kompetensi kerja (SKKNI, Standar Khusus, atau Standar Internasional).</p><p><strong>Perbedaan 2:</strong> Sertifikat training diterbitkan oleh Lembaga Pelatihan sehingga pengakuannya hanya pada Lembaga Pelatihan itu sendiri atau jejaringnya. Sertifikat Kompetensi kerja yang diterbitkan LSP terlisensi BNSP memiliki pengakuan secara nasional karena diterbitkan atas nama negara. Dengan adanya MEA, sertifikat ini dapat diakui hingga tingkat internasional.</p></li><li>Apa Manfaat Kepemilikan Sertifikat Kompetensi Bagi Tenaga Kerja?&nbsp;<ul><li>Mendapat pengakuan negara terhadap kompetensi yang dimiliki (UU No 13 Tahun 2013 Pasal 18).</li><li>Memperkuat kepercayaan pemberi kerja terhadap kompetensi pekerja.</li><li>Dapat mempengaruhi jenjang karir, grade, dan benefit di banyak perusahaan.</li><li>Memudahkan mobilitas tenaga kerja terampil di tingkat ASEAN (MEA 2015).</li></ul></li><li>Apa Manfaat Kepemilikan Sertifikat Kompetensi Bagi Industri/Pemberi Kerja?&nbsp;<ul><li>Meningkatkan kepercayaan terhadap perusahaan karena dikelola oleh tenaga kerja kompeten.</li><li>Meningkatkan daya saing perusahaan untuk pasar global.</li><li>Meyakinkan bahwa produk, sistem, dan personel sesuai standar (SNI &amp; SKKNI).</li></ul></li><li><p>Siapa yang Boleh Mengikuti Sertifikasi?&nbsp;</p><p>Setiap tenaga kerja yang berpengalaman maupun calon tenaga kerja terlatih dapat mengikuti sertifikasi kompetensi kerja sesuai persyaratan skema sertifikasi.</p></li><li><p>Berapa Biaya Sertifikasi?&nbsp;</p><p>Biaya sertifikasi ditetapkan di dalam skema sertifikasi. Peserta juga berkesempatan mendapat subsidi dari pemerintah melalui Program Sertifikasi Kompetensi Kerja (PSKK). Untuk info lebih lanjut silakan hubungi admin.</p></li><li><p>Berapa Masa Berlaku Sertifikat dan Bagaimana Pemeliharaannya?&nbsp;</p><p>Sertifikat berlaku 2–3 tahun. Pemeliharaan sesuai persyaratan skema, baik frekuensi maupun metode asesmen ulang.</p></li><li><p>Kapan dan Dimana Saya Bisa Mengikuti Uji Kompetensi?&nbsp;</p><p>Uji kompetensi dilaksanakan secara berkala setiap minggu, bisa dilakukan di hari kerja maupun akhir pekan. Lokasi uji kompetensi dapat berupa TUK Mandiri, TUK Sewaktu, atau TUK Tempat Kerja sesuai kesepakatan.</p></li><li><p>Bagaimana Kerahasiaan Informasi Jika Uji Kompetensi Dilakukan di TUK Tempat Kerja?&nbsp;</p><p>LSP menjamin kerahasiaan informasi yang diperoleh dalam proses sertifikasi. Informasi tidak akan dibuka tanpa izin peserta. Seluruh personel LSP menandatangani pakta integritas untuk menjaga kerahasiaan data sertifikasi.</p></li><li><p>Berapa Lama Sertifikat Terbit?&nbsp;</p><p>Standar layanan penerbitan sertifikat di LSP adalah 20 hari kerja sejak penetapan sebagai peserta sertifikasi hingga sertifikat kompetensi diterbitkan.</p></li></ul>',
                'category' => 'informasi',
                'status' => 'published',
                'display_on_homepage' => 0,
                'is_featured' => 0,
                'is_homepage' => 0,
                'featured_image' => NULL,
                'published_at' => NULL,
                'meta_description' => NULL,
                'meta_keywords' => NULL,
                'created_at' => '2025-08-19 06:30:38',
                'updated_at' => '2025-09-08 03:17:22',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Kelembagaan LSP',
                'slug' => 'kelembagaan-lsp',
                'content' => '<!-- ======= Page Content ======= -->
<section class="py-5">
<div class="container">
<!-- Judul -->
<h2 class="fw-bold mb-3">Sejarah LSP</h2>

<!-- Meta info -->
<div class="mb-4 text-muted small">
<i class="bi bi-person"></i> By Admin
&nbsp;&nbsp;
<i class="bi bi-tag"></i> Profil
</div>

<!-- Isi konten -->
<div class="content">
<p>
LSP <strong>Trainer Kompeten Indonesia</strong> dibentuk oleh Asosiasi Trainer Kompeten Indonesia pada tanggal 
20 November 2021, badan hukum telah dibuat oleh Notaris Deasy Widya Sari berkedudukan di Kabupaten Bantul 
dengan Akte Pendirian No. 14 dan telah disahkan oleh Menteri Hukum dan HAM Republik Indonesia dengan nomor 
AHU-0074603.AH.01.01. Tahun 2021.
</p>
</div>
</div>
</section>',
                'category' => 'profil',
                'status' => 'published',
                'display_on_homepage' => 0,
                'is_featured' => 0,
                'is_homepage' => 0,
                'featured_image' => NULL,
                'published_at' => NULL,
                'meta_description' => NULL,
                'meta_keywords' => NULL,
                'created_at' => '2025-08-19 06:51:36',
                'updated_at' => '2025-08-19 06:54:59',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Visi &  Misi',
                'slug' => 'visi-misi',
                'content' => '<!-- Konten Utama -->
<section class="py-5">
<div class="container">
<h2 class="fw-bold mb-3">Visi &amp; Misi LSP</h2>
<div class="text-muted small mb-4">
<i class="bi bi-person"></i> By Admin &nbsp;&nbsp;
<i class="bi bi-tag"></i> Profil
</div>

<div class="mb-4">
<h5 class="fw-semibold">Visi</h5>
<p>
Menjadikan Lembaga Sertifikasi Profesi Trainer Kompeten Indonesia
sebagai lembaga sertifikasi bidang pelatihan independen yang
terpercaya dalam pelayanan prima di seluruh Indonesia.
</p>
</div>

<div class="mb-5">
<h5 class="fw-semibold">Misi</h5>
<ol>
<li>
Mendukung pembangunan dan pengembangan profesi instruktur yang
kompeten dan profesional.
</li>
<li>
Mendukung pengembangan profesi instruktur sebagai satu pilar dalam
membangun sumber daya manusia Indonesia seutuhnya.
</li>
<li>
Mengembangkan kerjasama dan jejaring, bersinergi dengan pemangku
kepentingan.
</li>
</ol>
</div>',
                'category' => 'profil',
                'status' => 'published',
                'display_on_homepage' => 0,
                'is_featured' => 0,
                'is_homepage' => 0,
                'featured_image' => NULL,
                'published_at' => NULL,
                'meta_description' => NULL,
                'meta_keywords' => NULL,
                'created_at' => '2025-08-19 06:57:08',
                'updated_at' => '2025-08-19 06:57:56',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'Struktur Organisasi',
                'slug' => 'struktur-organisasi',
                'content' => '<section class="py-5">
<div class="container">
<h2 class="fw-bold mb-3">Struktur Organisasi LSP</h2>
<div class="text-muted small mb-4">
<i class="bi bi-person"></i> By Admin &nbsp;&nbsp;
<i class="bi bi-tag"></i> Profil
</div>',
                'category' => 'profil',
                'status' => 'published',
                'display_on_homepage' => 0,
                'is_featured' => 0,
                'is_homepage' => 0,
                'featured_image' => 'uploads/pages/Egifh1ugk7pXTkfwzukVh0OTHpNOEM9OqMxR5zzC.png',
                'published_at' => NULL,
                'meta_description' => NULL,
                'meta_keywords' => NULL,
                'created_at' => '2025-08-19 06:59:47',
                'updated_at' => '2025-08-19 06:59:47',
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'Brosur LSP',
                'slug' => 'brosur-lsp',
                'content' => '<section class="py-5">
<div class="container">
<h2 class="fw-bold mb-3">Brosur LSP</h2>
<div class="text-muted small mb-4">
<i class="bi bi-person"></i> By Admin &nbsp;&nbsp;
<i class="bi bi-tag"></i> Profil
</div>',
                'category' => 'media',
                'status' => 'published',
                'display_on_homepage' => 0,
                'is_featured' => 0,
                'is_homepage' => 0,
                'featured_image' => 'uploads/pages/R8wrsFwL6rnjjIM9M1wItkVT9PK7jOjDQdSZZC57.jpg',
                'published_at' => NULL,
                'meta_description' => NULL,
                'meta_keywords' => NULL,
                'created_at' => '2025-08-19 07:01:05',
                'updated_at' => '2025-08-19 07:01:05',
            ),
            5 => 
            array (
                'id' => 6,
                'title' => 'Wewenang, Tugas & Fungsi',
                'slug' => 'wewenang-tugas-fungsi',
                'content' => '<!-- Page Content -->
<section class="py-5">
<div class="container">
<!-- Judul Halaman -->
<h2 class="fw-bold mb-3">Wewenang, Tugas &amp; Fungsi</h2>

<!-- Info penulis -->
<div class="text-muted small mb-4">
<i class="bi bi-person"></i> By Admin &nbsp;&nbsp;
<i class="bi bi-tag"></i> Profil
</div>

<!-- Content: Kedudukan dan Fungsi -->
<div class="section-title text-start">KEDUDUKAN DAN FUNGSI</div>
<p>
LSP Trainer Kompeten Indonesia adalah organisasi tingkat nasional yang berkedudukan di wilayah Republik Indonesia,
berkantor pusat di Jl. Bangmalang No. 5, RT 56, Diro, Pendowoharjo, Sewon Bantul, Daerah Istimewa Yogyakarta.
</p>
<p>
Fungsi dari LSP Trainer Kompeten Indonesia adalah sebagai lembaga sertifikasi profesi di bidang Pelatihan Kerja,
yang dilaksanakan dengan memperhatikan perspektif Undang-Undang Ketenagakerjaan No 13 tahun 2003 antara lain:
</p>
<ol>
<li>Pasal 11: Setiap tenaga kerja berhak memperoleh dan/atau meningkatkan dan/atau mengembangkan kompetensi kerja melalui pelatihan kerja.</li>
<li>Pasal 12: Pengusaha bertanggung jawab atas peningkatan dan/atau pengembangan kompetensi pekerjanya melalui kerja.</li>
<li>Pasal 18 ayat 1: Tenaga kerja berhak memperoleh pengakuan kompetensi kerja setelah mengikuti pelatihan kerja yang diselenggarakan lembaga pelatihan kerja.</li>
<li>Pasal 18 ayat 2: Pengakuan kompetensi kerja dilakukan melalui sertifikasi kompetensi kerja.</li>
<li>Pasal 18 ayat 3: Sertifikasi kompetensi kerja dapat pula diikuti oleh tenaga kerja berpengalaman.</li>
</ol>

<!-- Content: Tugas -->
<div class="section-title mt-4 text-start">TUGAS</div>
<p>
LSP Trainer Kompeten Indonesia adalah organisasi tingkat nasional dan dapat memiliki cabang di kota-kota seluruh Republik Indonesia, memiliki tugas:
</p>
<ol>
<li>Melaksanakan sertifikasi kompetensi</li>
<li>Meninjau ulang standar Kompetensi</li>
<li>Menyusun skema sertifikasi melalui identifikasi kompetensi bidang</li>
<li>Membuat Materi Uji Kompetensi</li>
<li>Menyediakan tenaga penguji (asesor) sekaligus memelihara kinerja asesor; melakukan asesmen</li>
<li>Menetapkan tempat uji kompetensi (TUK) sekaligus memelihara kinerja TUK</li>
</ol>

<!-- Content: Wewenang -->
<div class="section-title mt-4 text-start">WEWENANG</div>
<p>Wewenang LSP Trainer Kompeten Indonesia adalah sebagai berikut:</p>
<ol>
<li>Menetapkan biaya uji kompetensi</li>
<li>Menerbitkan sertifikat kompetensi</li>
<li>Mencabut/membatalkan sertifikat kompetensi</li>
<li>Menetapkan dan memverifikasi TUK</li>
<li>Memberikan sanksi kepada asesor dan TUK yang melanggar aturan dan ketentuan</li>
<li>Mereview dan mengusulkan perbaikan standar kompetensi</li>
<li>Menyelenggarakan kerjasama dengan lembaga lain di dalam dan luar negeri yang mempunyai maksud dan tujuan yang sama</li>
</ol>
</div>
</section>

<!-- Custom CSS mirip website -->
<style>
.section-title {
background-color: #d9f5fb; /* biru muda */
color: #006699;            /* biru tua */
font-weight: 700;
padding: 10px 15px;
border-radius: 8px;
margin-bottom: 15px;
text-align: left;         
}
</style>',
                'category' => 'profil',
                'status' => 'published',
                'display_on_homepage' => 0,
                'is_featured' => 0,
                'is_homepage' => 0,
                'featured_image' => NULL,
                'published_at' => NULL,
                'meta_description' => NULL,
                'meta_keywords' => NULL,
                'created_at' => '2025-08-19 07:03:07',
                'updated_at' => '2025-08-19 07:15:30',
            ),
            6 => 
            array (
                'id' => 7,
                'title' => 'Tugas Pokok Personal',
                'slug' => 'tugas-pokok-personal',
                'content' => '<!-- Page Content --> <section class="py-5"> <div class="container"> <!-- Judul Halaman --> <h2 class="fw-bold mb-3">Tugas Pokok Personal</h2> <!-- Meta Info --> <div class="text-muted small mb-4"> <i class="bi bi-person"></i> By Admin &nbsp;&nbsp; <i class="bi bi-tag"></i> Profil </div>

<!-- Dewan Pengarah -->
<h6 class="fw-bold">URAIAN TUGAS DAN TANGGUNG JAWAB ORGANISASI LSP TRAINER KOMPETEN INDONESIA</h6>
<h6 class="fw-bold">Dewan Pengarah</h6>
<ol>
<li>Bertanggung atas keberlangsungan LSP</li>
<li>Penetapan visi, misi dan tujuan LSP</li>
<li>Menyusun rencana strategi, program kerja dan anggaran belanja</li>
<li>Mengangkat dan memberhentikan pelaksana LSP</li>
<li>Membina komunikasi dengan para pemangku kepentingan</li>
<li>Memobilisasi sumber daya.</li>
</ol>
<p>Peraturan BNSP Nomor 2 Tahun 2014 (7.1.3)</p>

<!-- Direktur LSP -->
<h6 class="fw-bold mt-4">Direktur LSP</h6>
<ol>
<li>Melaksanakan program kerja LSP</li>
<li>Melakukan monitoring dan evaluasi</li>
<li>Rencana program dan anggaran</li>
<li>Memberikan laporan bertanggungjawab kepada Dewan Pengarah</li>
</ol>
<p>Peraturan BNSP Nomor 2 Tahun 2014 (7.1.4)</p>

<!-- Manager Sertifikasi -->
<h6 class="fw-bold mt-4">Manager Sertifikasi</h6>
<ol>
<li>Memfasilitasi penyusunan skema sertifikasi</li>
<li>Gunakan perangkat asesmen dan materi uji</li>
<li>Melaksanakan sertifikasi, termasuk pemeliharaan dan sertifikasi ulang</li>
<li>Menentukan persyaratan tempat uji (TUK)</li>
<li>Melaksanakan pelaksanaan dan penetapan TUK</li>
<li>Melakukan rekrutmen asesor kompetensi serta pemeliharaan kompetensinya</li>
</ol>
<p>Peraturan BNSP Nomor 2 Tahun 2014 (7.1.5)</p>

<!-- Manager Mutu -->
<h6 class="fw-bold mt-4">Manager Mutu</h6>
<ol>
<li>Menerapkan sistem manajemen mutu LSP sesuai Pedoman BNSP</li>
<li>Memelihara berlangsungnya sistem manajemen agar tetap sesuai standar dan pedoman</li>
<li>Melakukan audit internal dan memfasilitasi kaji ulang manajemen</li>
</ol>
<p>Peraturan BNSP Nomor 2 Tahun 2014 (7.1.6)</p>

<!-- Manager Administrasi & TUK -->
<h6 class="fw-bold mt-4">Manager Administrasi &amp; Tempat Uji Kompetensi</h6>
<ol>
<li>Memfasilitasi unsur-unsur LSP guna terselenggaranya program sertifikasi profesi</li>
<li>Melaksanakan tugas-tugas ketatausahaan organisasi LSP</li>
<li>Memelihara informasi sertifikasi kompetensi</li>
<li>Mengetahui laporan kegiatan LSP</li>
</ol>
<p>Peraturan BNSP Nomor 2 Tahun 2014 (7.1.7)</p>

<!-- Manager Keuangan -->
<h6 class="fw-bold mt-4">Manager Keuangan</h6>
<ol>
<li>Merencanakan penerimaan dan pengeluaran LSP</li>
<li>Menerima dan mengeluarkan anggaran LSP</li>
<li>Membuat laporan penggunaan dana</li>
</ol>
<p>Peraturan BNSP Nomor 2 Tahun 2014</p>
</div>
</section>',
                'category' => 'profil',
                'status' => 'published',
                'display_on_homepage' => 0,
                'is_featured' => 0,
                'is_homepage' => 0,
                'featured_image' => NULL,
                'published_at' => NULL,
                'meta_description' => NULL,
                'meta_keywords' => NULL,
                'created_at' => '2025-08-19 07:17:44',
                'updated_at' => '2025-08-20 06:21:48',
            ),
            7 => 
            array (
                'id' => 8,
                'title' => 'Program Kerja',
                'slug' => 'program-kerja',
                'content' => '<!-- Page Content -->
<section class="py-5">
<div class="container">
<!-- Judul Halaman -->
<h2 class="fw-bold mb-3">Program Kerja</h2>

<!-- Meta Info -->
<div class="text-muted small mb-4">
<i class="bi bi-person"></i> By Admin &nbsp;&nbsp;
<i class="bi bi-tag"></i> Profil
</div>

<!-- Intro -->
<p>
<strong>PROGRAM KERJA</strong><br />
LSP Trainer Kompeten Indonesia telah menyusun program kerja jangka menengah 4 (empat) tahun ke depan: 
<strong>2022–2026</strong>, dengan garis besar sebagai berikut:
</p>

<!-- Seksi: Bidang Sertifikasi -->
<strong>BIDANG SERTIFIKASI</strong><br />
<ol>
<li>Mengajukan permohonan full assessment lisensi kepada BNSP dengan memenuhi semua persyaratan.</li>
<li>Menyusun time schedule full assessment dan witness untuk memperoleh lisensi, sehingga LSP TKI dapat melaksanakan uji kompetensi bagi para pengelola pelatihan dan instruktur.</li>
</ol>

<!-- Seksi: Bidang Skema & TUK -->
<strong>BIDANG SKEMA & TUK</strong><br />
<p>
Sesuai dengan usulan lisensi, terdapat 5 (lima) skema okupasi terverifikasi oleh BNSP: Pelatih di Tempat Kerja, Instruktur Junior, Instruktur, Instruktur Master, dan Penyelenggara Pelatihan.
</p>
<ul>
<li>Komite Skema membentuk tim kerja yang terdiri dari assessor dan Subject Matter Expert (SME) dari perguruan tinggi/lembaga kajian.</li>
<li>Rencana Pengembangan Skema disusun untuk mengembangkan cakupan dan kualitas skema.</li>
</ul>

<!-- Gambar Penambahan Skema -->
<div class="text-center my-4">
<img src="/THEMES/Medicio/assets/img/penambahan_skema.jpg" alt="Penambahan Skema" class="img-fluid rounded shadow-sm">
</div>

<!-- Pelaksanaan Uji Kompetensi -->
<strong>PELAKSANAAN UJI KOMPETENSI</strong><br />
<p>
Apabila lisensi LSP Trainer Kompeten Indonesia telah diperoleh dari BNSP, pelaksanaan uji kompetensi bagi seluruh pengelola pelatihan di sejumlah wilayah segera dilaksanakan. Rencana untuk 5 (lima) skema yang telah terverifikasi dapat dilihat pada ilustrasi berikut:
</p>

<!-- Gambar Target Pasar -->
<div class="text-center my-4">
<img src="/THEMES/Medicio/assets/img/target_pasar1.jpg" alt="Target Pasar" class="img-fluid rounded shadow-sm">
</div>

<!-- Seksi: Bidang Keuangan -->
<strong>BIDANG KEUANGAN</strong><br />
<ul>
<li>Menyusun SOP Bidang Keuangan dan aplikasi program keuangan.</li>
<li>Menyusun Rencana Kerja dan Anggaran (RKA) jangka pendek (tahunan).</li>
<li>Evaluasi RKAP secara berkala (per semester).</li>
<li>Menyusun laporan kinerja triwulan dan tahunan.</li>
</ul>

<!-- Seksi: Bidang SDM & Umum -->
<strong>BIDANG SDM & UMUM</strong><br />
<ul>
<li>Menyusun rencana pelatihan bagi pengurus, asesor, auditor, dan staf training bersama BNSP.</li>
<li>Ikut serta dalam pelatihan eksternal untuk penguatan kompetensi, keuangan, pajak, dan operasional.</li>
<li>Rekrutmen dan seleksi SDM/Personil LSP TKI.</li>
<li>Mengembangkan sistem uji kompetensi digital yang user-friendly dan paperless.</li>
<li>Melakukan surveilans kompetensi setiap 2 tahun sekali terhadap pengguna sertifikat, sebagai motivasi kualitas berkelanjutan.</li>
</ul>

<!-- Intro -->
<p>
<strong>Pemeliharaan Kompetensi Pengelola Pelatihan dan Instruktur melalui Surveilance</strong><br />
Pemeliharaan kompetensi sebagai salah satu cara untuk menjaga kompetensi agar dapat selalu terjamin kualitasnya sesuai dengan kebutuhan,maka LSP Trainer Kompeten Indonesia akan mengadakan Surveilance pada pengguna sertifikat selama 2 (dua) tahun sekali untuk memastikan bahwa pengguna sertifikat masih kompeten dan sesuai pada profesinya. Pelaksanaannya dilakukan secara sampel dengan tetap memperhatikan keterwakilan peserta peserta uji kompetensi.
</p>
</div>
</section>',
                'category' => 'profil',
                'status' => 'published',
                'display_on_homepage' => 0,
                'is_featured' => 0,
                'is_homepage' => 0,
                'featured_image' => NULL,
                'published_at' => NULL,
                'meta_description' => NULL,
                'meta_keywords' => NULL,
                'created_at' => '2025-08-19 07:25:31',
                'updated_at' => '2025-08-19 08:06:38',
            ),
            8 => 
            array (
                'id' => 9,
                'title' => 'Tempat Uji Kompetensi',
                'slug' => 'tempat-uji-kompetensi',
                'content' => '<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tempat Uji Kompetensi</title>
<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- DataTables -->
<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">

<style>
body {
margin: 20px;
}
h2 {
font-weight: 600;
margin-bottom: 20px;
}
table.dataTable tbody tr {
background-color: #fff;
}
.navbar-nav .nav-link {
color: #444;          /* warna teks */
font-weight: 600;     /* biar lebih tegas */
text-decoration: none; /* hilangkan garis bawah */
}

.navbar-nav .nav-link:hover {
color: #00b4b4;       /* warna saat hover (misalnya biru toska sesuai tombol Login) */
text-decoration: none;
}


</style>
</head>
<body>
<div class="container">
<h2>TEMPAT UJI KOMPETENSI</h2>
<table id="tabel-sertifikat" class="display" style="width:100%">
<thead>
<tr>
<th>No</th>
<th>Nama</th>
<th>Alamat</th>
</tr>
</thead>
<tbody>
<tr><td>1</td><td>TUK Sewaktu Acarya Sinergi Teknodukasi</td><td>Jl. Inti IBlok C1/7, Lippo Cikarang, Bekasi 17550, West Java</td></tr>
<tr><td>2</td><td>TUK Sewaktu Bintang Indonesia - Medan</td><td>Jl. Garu 2A No. 44D, Medan, North Sumatra</td></tr>
<tr><td>3</td><td>TUK Sewaktu Cepit</td><td>Jl. Bangmalang No. 5 Room 202 - 204, RT 56, Diro, Pendowoharjo, Sewon, Bantul, Yogyakarta</td></tr>
<tr><td>4</td><td>TUK Sewaktu D Hotel</td><td>Jl. Sultan Agung No. 3, Setia Budi, South Jakarta, DKI Jakarta</td></tr>
<tr><td>5</td><td>TUK Sewaktu KP2TEL Semarang</td><td>Telkom Johar, Jl. Arif Rahman Hakim No.1, Semarang</td></tr>
<tr><td>6</td><td>TUK Sewaktu LPK Kibar Madani</td><td>Tiban Housing Blok B4 No. 10 - 11, Batam, Riau Islands</td></tr>
<tr><td>7</td><td>TUK Sewaktu Pena Semesta Academy</td><td>Sukorejo 59, RT 05 RW 02, Buduran, Sidoarjo, East Java</td></tr>
<tr><td>8</td><td>TUK Sewaktu Divine ARich Academy</td><td>Jl. Sedap Malam 1, Griya Sako Permai, Palembang</td></tr>
<tr><td>9</td><td>TUK Sewaktu Hotel Sofyan Cut Mutia Menteng</td><td>Jl. Cut Mutia No.9, Menteng, Central Jakarta</td></tr>
<tr><td>10</td><td>TUK Sewaktu Daima Hotel Padang</td><td>Jl. Jend. Sudirman No.17, Padang, West Sumatra</td></tr>
<tr><td>11</td><td>TUK P2SDM Batam</td><td>Ruko Taman Niaga Blok D No.2-3, Sukajadi, Batam</td></tr>
<tr><td>12</td><td>TUK Sewaktu @Hom Premiere Timoho</td><td>Jl. Ipda Tut Harsono No.24, Umbulharjo, Yogyakarta</td></tr>
<tr><td>13</td><td>Kibar Madani Yogyakarta</td><td>Yudonegaran GM 2 / 212, Gondomanan, Yogyakarta</td></tr>
<tr><td>14</td><td>TUK Abadi Hotel Malioboro</td><td>Jl. Ps. Kembang No.49, Gedong Tengen, Yogyakarta</td></tr>
<tr><td>15</td><td>TUK Aya Sophia Academy Indonesia</td><td>Cluster Jesisca 1 Blok D No 8-9, Tangerang, Banten</td></tr>
<tr><td>16</td><td>TUK Character Academy</td><td>Kemang Ifi Graha, Jatirasa, Bekasi</td></tr>
<tr><td>17</td><td>TUK Nayata Corporate University</td><td>Metland Menteng Blok F4 No.10, Cakung, East Jakarta</td></tr>
<tr><td>18</td><td>TUK Sinergi Gaya Potenza Indonesia</td><td>Jl. Gurun Laweh No 4A, Lubuk Begalung, Padang, West Sumatra</td></tr>
<tr><td>19</td><td>TUK Hotel Muara Ternate</td><td>Jl. Merdeka No.19, Ternate, North Maluku</td></tr>
</tbody>
</table>
</div>

<!-- jQuery & DataTables -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
$(\'#tabel-sertifikat\').DataTable({
"paging": true,
"lengthChange": true,
"searching": true,
"ordering": true,
"info": true,
"autoWidth": false,
"columnDefs": [
{ "targets": "_all", "render": $.fn.dataTable.render.text() }
],
"language": {
"emptyTable": "Tidak ada data tersedia",
"lengthMenu": "Tampilkan _MENU_ data",
"search": "Cari:",
"paginate": {
"previous": "Sebelumnya",
"next": "Berikutnya"
},
"info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
"infoEmpty": "Menampilkan 0 sampai 0 dari 0 data"
}
});
});
</script>
</body>
</html>',
        'category' => 'sertifikasi',
        'status' => 'published',
        'display_on_homepage' => 0,
        'is_featured' => 0,
        'is_homepage' => 0,
        'featured_image' => NULL,
        'published_at' => NULL,
        'meta_description' => NULL,
        'meta_keywords' => NULL,
        'created_at' => '2025-08-19 08:18:02',
        'updated_at' => '2025-08-25 01:15:14',
    ),
    9 => 
    array (
        'id' => 10,
        'title' => 'Asesor Kompetensi',
        'slug' => 'asesor-kompetensi',
        'content' => '<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Asesor Kompetensi</title>

<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- DataTables -->
<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">

<style>
body {
margin: 20px;
}

h2 {
font-weight: 600;
margin-bottom: 20px;
}

table.dataTable tbody tr {
background-color: #fff;
}
</style>
</head>
<body>
<div class="container">
<h2>ASESOR KOMPETENSI</h2>

<table id="tabel-sertifikat" class="display" style="width:100%">
<thead>
<tr>
<th>No</th>
<th>Nama</th>
<th>No. Registrasi</th>
</tr>
</thead>
<tbody>
<tr><td>1</td><td>Ade Rupawan</td><td>MET.000.002627 2022</td></tr>
<tr><td>2</td><td>Adi Soeprapto</td><td>MET.000.002648 2022</td></tr>
<tr><td>3</td><td>Berlian Aniek Herlina</td><td>MET.000.002641 2022</td></tr>
<tr><td>4</td><td>Dewi Lestari</td><td>MET.000.002636 2022</td></tr>
<tr><td>5</td><td>Dhewsi Arsiani</td><td>MET.000.002643 2022</td></tr>
<tr><td>6</td><td>Erlik Isfandiari</td><td>MET.000.002634 2022</td></tr>
<tr><td>7</td><td>Leli Mardiana</td><td>MET.000.002633 2022</td></tr>
<tr><td>8</td><td>Mochamad Makrup</td><td>MET.000.002639 2022</td></tr>
<tr><td>9</td><td>Runny Yuliasari</td><td>MET.000.002630 2022</td></tr>
<tr><td>10</td><td>Ronald Healtha Dedi Satria</td><td>MET.000.002644 2022</td></tr>
<tr><td>11</td><td>Saptawati</td><td>MET.000.002635 2022</td></tr>
<tr><td>12</td><td>Satrya Yudha Wibowo</td><td>MET.000.002628 2022</td></tr>
<tr><td>13</td><td>Tin Dels Marce Ndawu</td><td>MET 000.002194 2021</td></tr>
<tr><td>14</td><td>Marte Lusiati</td><td>MET.000.003710 2020</td></tr>
<tr><td>15</td><td>Moh. Badaruddin Hadi</td><td>MET.000.003699 2020</td></tr>
<tr><td>16</td><td>Emmy Junianti</td><td>MET.000.002640 2022</td></tr>
<tr><td>17</td><td>Agus Sudiyar Tanjung</td><td>MET.000.002637 2022</td></tr>
<tr><td>18</td><td>Retno Astuti Wulandari</td><td>MET.000.002626 2022</td></tr>
<tr><td>19</td><td>Minarni Anita Romaida Gultom</td><td>MET.000.002625 2022</td></tr>
<tr><td>20</td><td>Vittria Tattiana, S.Psi</td><td>MET.000.000500 2015</td></tr>
<tr><td>21</td><td>Cahyo Budi Santoso</td><td>MET.000.016496 2019</td></tr>
<tr><td>22</td><td>Moch Aminudin Hadi</td><td>MET.000.007108 2015</td></tr>
<tr><td>23</td><td>Triyono Suryoning Putro</td><td>MET.000.005650 2017</td></tr>
<tr><td>24</td><td>Untung Subagyo</td><td>MET.000.008693 2024</td></tr>
<tr><td>25</td><td>Bayu Kurniawan</td><td>MET.000.008680 2024</td></tr>
<tr><td>26</td><td>Muhammad Yusuf Abdurrahman</td><td>MET.000.008679 2024</td></tr>
<tr><td>27</td><td>Mitha Evi Rahmadhona</td><td>MET.000.008682 2024</td></tr>
<tr><td>28</td><td>Lina Nur Hidayati</td><td>MET.000.008677 2024</td></tr>
<tr><td>29</td><td>Dianne Dear</td><td>MET.000.008686 2024</td></tr>
<tr><td>30</td><td>Rita Hastuti</td><td>MET.000.008685 2024</td></tr>
<tr><td>31</td><td>Uton Wartono</td><td>MET.000.008687 2024</td></tr>
<tr><td>32</td><td>Masduki Asbari</td><td>MET.000.002625 2016</td></tr>
<tr><td>33</td><td>Wakhida Nurhayati</td><td>MET.000.008689 2024</td></tr>
<tr><td>34</td><td>Suyatno</td><td>MET.000.008675 2024</td></tr>
</tbody>
</table>
</div>

<!-- jQuery & DataTables -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
$(\'#tabel-sertifikat\').DataTable({
paging: true,
lengthChange: true,
searching: true,
ordering: true,
info: true,
autoWidth: false,
language: {
emptyTable: "No data available in table",
lengthMenu: "Show _MENU_ entries",
search: "Search:",
paginate: {
previous: "Previous",
next: "Next"
},
info: "Showing _START_ to _END_ of _TOTAL_ entries",
infoEmpty: "Showing 0 to 0 of 0 entries"
}
});
});
</script>
</body>
</html>',
'category' => 'sertifikasi',
'status' => 'published',
'display_on_homepage' => 0,
'is_featured' => 0,
'is_homepage' => 0,
'featured_image' => NULL,
'published_at' => NULL,
'meta_description' => NULL,
'meta_keywords' => NULL,
'created_at' => '2025-08-20 03:16:31',
'updated_at' => '2025-08-25 02:00:38',
),
10 => 
array (
'id' => 11,
'title' => 'Pemegang Sertifikat',
'slug' => 'pemegang-sertifikat',
'content' => '<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Daftar Pemegang Sertifikat</title>
<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- DataTables -->
<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">

<style>
body {
margin: 20px;
}
h2 {
font-weight: 600;
margin-bottom: 20px;
}
table.dataTable tbody tr {
background-color: #fff;
}
</style>
</head>
<body>
<div class="container">
<h2>DAFTAR PEMEGANG SERTIFIKAT</h2>
<table id="tabel-sertifikat" class="display" style="width:100%">
<thead>
<tr>
<th>No</th>
<th>Nama</th>
<th>No. Registrasi</th>
</tr>
</thead>
<tbody>
<!-- Kosong dulu agar muncul "No data available in table" -->
</tbody>
</table>
</div>

<!-- jQuery & DataTables -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
$(\'#tabel-sertifikat\').DataTable({
"paging": true,
"lengthChange": true,
"searching": true,
"ordering": true,
"info": true,
"autoWidth": false,
"language": {
"emptyTable": "No data available in table",
"lengthMenu": "Show _MENU_ entries",
"search": "Search:",
"paginate": {
"previous": "Previous",
"next": "Next"
},
"info": "Showing _START_ to _END_ of _TOTAL_ entries",
"infoEmpty": "Showing 0 to 0 of 0 entries"
}
});
});
</script>
</body>
</html>',
'category' => 'sertifikasi',
'status' => 'published',
'display_on_homepage' => 0,
'is_featured' => 0,
'is_homepage' => 0,
'featured_image' => NULL,
'published_at' => NULL,
'meta_description' => NULL,
'meta_keywords' => NULL,
'created_at' => '2025-08-20 06:07:21',
'updated_at' => '2025-08-20 06:07:21',
),
11 => 
array (
'id' => 12,
'title' => 'Kontak',
'slug' => 'kontak',
'content' => '<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
<div class="container">
<div class="section-title">
<h2>Kontak Kami</h2>
</div>
</div>

<!-- Google Maps Embed -->
<div>
<iframe style="border:0; width: 100%; height: 350px;"
src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.920759929992!2d110.3360937!3d-7.8625761!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5747828cf8e5%3A0x3f6419de12178de5!2sLSP%20Trainer%20Kompeten%20Indonesia!5e0!3m2!1sid!2sid!4v1720586300994!5m2!1sid!2sid"
frameborder="0" allowfullscreen></iframe>
</div>

<div class="container">
<div class="row mt-5">

<!-- Informasi Kontak -->
<div class="col-lg-6">
<div class="row">
<div class="col-md-12">
<div class="info-box">
<i class="bx bx-map"></i>
<h3>Alamat Kami</h3>
<p>
Jalan Bangmalang No. 5, RT 56, Dusun Diro, Kelurahan Pendowoharjo<br>
Kecamatan Sewon, Kabupaten Bantul, Provinsi Daerah Istimewa Yogyakarta
</p>
</div>
</div>

<div class="col-md-6">
<div class="info-box mt-4">
<i class="bx bx-envelope"></i>
<h3>Email Kami</h3>
<p>admin@lsptrainerkompetenindonesia.id</p>
</div>
</div>

<div class="col-md-6">
<div class="info-box mt-4">
<i class="bx bx-phone-call"></i>
<h3>Hubungi Kami</h3>
<a href="https://wa.me/6281364715451" target="_blank" style="color: inherit; text-decoration: none;">
<p>0813-6471-5451</p>
</a>
</div>
</div>
</div>
</div>

<!-- Form Kontak -->
<div class="col-lg-6">
<form action="{{ route(\'kontak.submit\') }}" method="POST" role="form" id="contactForm" class="php-email-form">
@csrf
<div class="row">
<div class="col-md-6 form-group">
<input type="text" name="name" class="form-control rounded" placeholder="Nama Anda" required>
</div>
<div class="col-md-6 form-group mt-3 mt-md-0">
<input type="email" name="email" class="form-control rounded" placeholder="Email Anda" required>
</div>
</div>
<div class="form-group mt-3">
<input type="text" name="subject" class="form-control rounded" placeholder="Subjek" required>
</div>
<div class="form-group mt-3">
<textarea name="message" class="form-control rounded" rows="7" placeholder="Pesan Anda" required></textarea>
</div>
<div class="text-center mt-4">
<button type="submit" class="btn btn-info text-white px-4 py-2 rounded">Kirim Pesan</button>
</div>
<div id="formAlert" class="mt-3"></div>
</form>
</div>

</div>
</div>
</section>
<!-- End Contact Section -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center">
<i class="bi bi-arrow-up-short"></i>
</a>
@endsection

@push(\'styles\')
<style>
.form-control {
background-color: #fff;
border: 1px solid #ced4da;
padding: 12px 15px;
font-size: 16px;
}

.btn-info {
background-color: #34b7a7;
border: none;
}

.btn-info:hover {
background-color: #2aa193;
}
</style>
@endpush

@push(\'scripts\')
<script>
document.getElementById(\'contactForm\').addEventListener(\'submit\', function(e) {
e.preventDefault();

const form = e.target;
const formData = new FormData(form);
const alertBox = document.getElementById(\'formAlert\');

fetch(form.action, {
method: \'POST\',
headers: {
\'X-CSRF-TOKEN\': form.querySelector(\'[name="_token"]\').value,
\'Accept\': \'application/json\',
},
body: formData
})
.then(response => response.json())
.then(data => {
alertBox.innerHTML = `<div class="alert alert-success">${data.success}</div>`;
form.reset();
})
.catch(error => {
alertBox.innerHTML = `<div class="alert alert-danger">Gagal mengirim pesan.</div>`;
});
});
</script>
@endpush',
'category' => 'kontak',
'status' => 'published',
'display_on_homepage' => 0,
'is_featured' => 0,
'is_homepage' => 0,
'featured_image' => NULL,
'published_at' => NULL,
'meta_description' => NULL,
'meta_keywords' => NULL,
'created_at' => '2025-08-24 13:44:36',
'updated_at' => '2025-08-24 13:44:36',
),
12 => 
array (
'id' => 13,
'title' => 'Artikel',
'slug' => 'artikel',
'content' => '-',
'category' => 'informasi',
'status' => 'published',
'display_on_homepage' => 0,
'is_featured' => 0,
'is_homepage' => 0,
'featured_image' => NULL,
'published_at' => NULL,
'meta_description' => NULL,
'meta_keywords' => NULL,
'created_at' => '2025-08-29 02:54:45',
'updated_at' => '2025-08-29 02:54:45',
),
));
        
        
    }
}