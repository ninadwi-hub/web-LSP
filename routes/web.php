<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GaleriPublikController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\PageController;

//Static Page
// Untuk halaman publik
Route::get('/halaman/{slug}', [FrontendController::class, 'show'])->name('pages.show');

// Untuk admin
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('pages', \App\Http\Controllers\Admin\PageController::class);
});

// Halaman Blade statis langsung
Route::view('/profil/sejarah-visi-&-misi', 'profil.sejarah-visi-&-misi');
Route::view('/profil/struktur-organisasi', 'profil.struktur-organisasi');
Route::view('/profil/wewenang-tugas-&-fungsi', 'profil.wewenang-tugas-&-fungsi');
Route::view('/profil/tugas-pokok-personal', 'profil.tugas-pokok-personal');
Route::view('/profil/program-kerja', 'profil.program-kerja');
Route::view('/informasi/faq', 'informasi.faq')->name('informasi.faq');
Route::view('/media/brosur', 'media.brosur')->name('media.brosur');
Route::view('/sertifikasi/asesor-kompetensi', 'sertifikasi.asesor-kompetensi')->name('sertifikasi.asesor');
Route::view('/sertifikasi/pemegang-sertifikat', 'sertifikasi.pemegang-sertifikat')->name('sertifikasi.pemegang');
Route::view('/sertifikasi/skema-sertifikasi', 'sertifikasi.skema-sertifikasi')->name('sertifikasi.skema');
Route::view('/sertifikasi/tempat-uji', 'sertifikasi.tempat-uji')->name('sertifikasi.tuk');

// Galeri Publik
Route::get('/galeri/publik', [GaleriPublikController::class, 'index'])->name('galeri.publik');

// Kontak Publik
Route::get('/kontak', [FrontendController::class, 'showKontak'])->name('kontak');
Route::post('/kontak', [KontakController::class, 'submitForm'])->name('kontak.submit');

// File Download Publik
Route::get('/file-download', [MediaController::class, 'publicIndex'])->name('media.publik');

// ===========================
// Auth Routes
// ===========================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ===========================
// Route dengan Auth Middleware
// ===========================
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Resource Admin
    Route::resource('users', UserController::class);
    Route::resource('kategoris', KategoriController::class);
    Route::resource('menus', MenuController::class);
    Route::resource('galeri', GaleriController::class);

    // Kontak Admin
    Route::prefix('admin/kontak')->group(function () {
        Route::get('/', [KontakController::class, 'index'])->name('contacts.index');
        Route::get('/create', [KontakController::class, 'create'])->name('contacts.create');
        Route::post('/', [KontakController::class, 'store'])->name('contacts.store');
        Route::get('/{id}/edit', [KontakController::class, 'edit'])->name('contacts.edit');
        Route::put('/{id}', [KontakController::class, 'update'])->name('contacts.update');
        Route::delete('/{id}', [KontakController::class, 'destroy'])->name('contacts.destroy');
    });

    // Media Admin
    Route::resource('/admin/media', MediaController::class)
        ->parameters(['media' => 'media'])
        ->names('media');
});

// ===========================
// Info Routes
// ===========================
Route::resource('infos', InfoController::class);
Route::get('/informasi/{id}', [InfoController::class, 'show'])->name('infos.show');
Route::get('/informasi/publik', [InfoController::class, 'publik'])->name('info.publik');

// Homepage
Route::get('/', [FrontendController::class, 'home'])->name('home');

// Fallback slug (jika slug bukan yang di atas)
Route::get('/{slug}', [FrontendController::class, 'show'])
    ->where('slug', '^(?!halaman|admin|login|logout|dashboard|media|galeri|kontak|informasi|infos|file-download|pages).*$')
    ->name('page.show');
