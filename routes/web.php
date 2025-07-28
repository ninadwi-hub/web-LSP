<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\DashboardController;

// Info
Route::resource('infos', InfoController::class);
Route::get('/informasi/{id}', [InfoController::class, 'show'])->name('infos.show');

// Halaman publik
Route::get('/kontak', [KontakController::class, 'showForm'])->name('kontak.form');
Route::post('/kontak', [KontakController::class, 'submitForm'])->name('kontak.submit');

// Panel Admin - Kontak
Route::prefix('admin/kontak')->middleware('auth')->group(function () {
    Route::get('/', [KontakController::class, 'index'])->name('contacts.index');
    Route::get('/create', [KontakController::class, 'create'])->name('contacts.create');
    Route::post('/', [KontakController::class, 'store'])->name('contacts.store');
    Route::get('/{id}/edit', [KontakController::class, 'edit'])->name('contacts.edit');
    Route::put('/{id}', [KontakController::class, 'update'])->name('contacts.update');
    Route::delete('/{id}', [KontakController::class, 'destroy'])->name('contacts.destroy');
});

// Admin - Media
Route::resource('/admin/media', MediaController::class)
    ->parameters(['media' => 'media'])
    ->names('media')
    ->middleware('auth');

// Publik - Media
Route::get('/file-download', [MediaController::class, 'publicIndex'])->name('media.publik');

// Admin - Galeri
Route::resource('galeri', GaleriController::class);

// Publik - Galeri
Route::get('/galeripublik', [GaleriController::class, 'showGallery'])->name('galeripublik');

// Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard & Admin Resource
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('kategoris', KategoriController::class);
    Route::resource('pages', PageController::class);
    Route::get('/page/{slug}', [PageController::class, 'show'])->name('page.show');

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

// Media
Route::view('/media/brosur', 'media.brosur')->name('media.brosur');

// Sertifikasi
Route::view('/sertifikasi/asesor-kompetensi', 'sertifikasi.asesor-kompetensi')->name('sertifikasi.asesor');
Route::view('/sertifikasi/pemegang-sertifikat', 'sertifikasi.pemegang-sertifikat')->name('sertifikasi.pemegang');
Route::view('/sertifikasi/skema-sertifikasi', 'sertifikasi.skema-sertifikasi')->name('sertifikasi.skema');
Route::view('/sertifikasi/tempat-uji', 'sertifikasi.tempat-uji')->name('sertifikasi.tuk');

// Slug dinamis dari PageController
Route::resource('/admin/pages', PageController::class)->middleware('auth');
Route::get('/halaman/{slug}', [PublicPageController::class, 'show'])->name('page.show');

