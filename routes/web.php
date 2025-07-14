<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\KontakController;

// Form kontak publik
Route::get('/kontakk', [KontakController::class, 'showForm'])->name('kontakk.form');

// Proses kirim
Route::post('/kontakk', [KontakController::class, 'submitForm'])->name('kontakk.kirim');
Route::get('/admin/kontak/create', [KontakController::class, 'showForm'])->name('kontakk');


// Untuk admin
Route::get('/admin/kontak', [KontakController::class, 'index'])->name('kontak-lsp');

// Admin
Route::resource('/admin/media', MediaController::class)->middleware('auth');

// Publik
Route::get('/file-download', [MediaController::class, 'publicIndex'])->name('media.publik');

Route::prefix('panel')->middleware('auth')->group(function () {
    Route::resource('galeri', GaleriController::class);
});
Route::get('/galeri', [GaleriController::class, 'publicIndex'])->name('galeri.publik');

// Route login & auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard dan route admin (hanya jika login)
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', fn() => view('admin.dashboard'))->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('kategoris', KategoriController::class);
    Route::resource('infos', InfoController::class);
    Route::resource('pages', PageController::class); // hanya untuk admin
});

// Static Pages - Umum
Route::view('/', 'home');
Route::view('/profil/sejarah-visi-&-misi', 'profil.sejarah-visi-&-misi');
Route::view('/profil/struktur-organisasi', 'profil.struktur-organisasi');
Route::view('/profil/wewenang-tugas-&-fungsi', 'profil.wewenang-tugas-&-fungsi');
Route::view('/profil/tugas-pokok-personal', 'profil.tugas-pokok-personal');
Route::view('/profil/program-kerja', 'profil.program-kerja');
Route::view('/kontak', 'kontak')->name('kontak');
Route::view('/informasi/faq', 'informasi.faq')->name('informasi.faq');




// MEDIA
Route::view('/media/brosur', 'media.brosur')->name('media.brosur');

// SERTIFIKASI
Route::view('/sertifikasi/asesor-kompetensi', 'sertifikasi.asesor-kompetensi')->name('sertifikasi.asesor');
Route::view('/sertifikasi/pemegang-sertifikat', 'sertifikasi.pemegang-sertifikat')->name('sertifikasi.pemegang');
Route::view('/sertifikasi/skema-sertifikasi', 'sertifikasi.skema-sertifikasi')->name('sertifikasi.skema');
Route::view('/sertifikasi/tempat-uji', 'sertifikasi.tempat-uji')->name('sertifikasi.tuk');

// Route slug halaman publik dari database
Route::get('/{slug}', [PageController::class, 'showPublic'])->name('pages.public.show');
Route::get('/{slug}', [PageController::class, 'show'])->name('pages.public.show');







