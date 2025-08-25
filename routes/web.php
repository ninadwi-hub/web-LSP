<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\PublicInfoController; 
use App\Http\Controllers\SkemaPublicController;
use App\Http\Controllers\Admin\SkemaController as AdminSkemaController;
use App\Http\Controllers\Admin\UnitKompetensiController as AdminUnitKompetensiController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


Route::prefix('admin')->group(function() {
    Route::resource('menus', MenuController::class);
});

// ==================== FRONTEND ====================
// Daftar skema sertifikasi
Route::get('/home/skema_sertifikasi', [FrontendController::class, 'skemaSertifikasi'])
    ->name('skema.index');

// Detail skema sertifikasi
Route::get('/home/skema_sertifikasi/detail/{id}', [FrontendController::class, 'skemaDetail'])
    ->name('skema.detail');

// routes/web.php
Route::get('/skema-sertifikasi', [FrontendController::class, 'skemaIndex'])
    ->name('frontend.skema.index');
Route::get('/skema/{id}', [FrontendController::class, 'skemaDetail'])
    ->name('frontend.skema.detail');

Route::get('/page/{slug}', [FrontendController::class, 'page'])->name('page.show');

// ==================== ADMIN ====================
// Semua route admin di-prefix 'panell' dan pakai auth
Route::prefix('panell')->middleware(['auth'])->name('panell.')->group(function () {

    // CRUD Skema Sertifikasi
    Route::resource('skema', AdminSkemaController::class)->except(['show']);

    // CRUD Unit Kompetensi
    Route::resource('unit', AdminUnitKompetensiController::class)->except(['show']);
});

// Admin Info (CRUD)
Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('info', InfoController::class);
});

// ===========================
// ADMIN ROUTES (Harus Login)
// ===========================
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('info', InfoController::class);
});

// ===========================
// Halaman Utama Website
// ===========================
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/beranda', fn() => redirect()->route('home'))->name('website');

// ===========================
// Halaman Publik Statis dari Database
// ===========================
Route::get('/halaman/{slug}', [FrontendController::class, 'showPage'])->name('info.showw');
Route::get('/info/{slug}', [InfoController::class, 'show'])->name('info.showw');
Route::get('/info/detail/{id}', [InfoController::class, 'showById'])->name('info.showById');
Route::get('/info/{slug}', [FrontendController::class, 'showInfo'])->name('info.showw');

// Halaman publik berdasarkan slug (frontend)
Route::get('/page/{slug}', [FrontendController::class, 'showPage'])->name('page.show');

 // ===========================
// Kontak Publik
// ===========================
Route::get('/kontak', [FrontendController::class, 'showKontak'])->name('kontak');
Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.submit');

// Halaman statis (section khusus)
Route::get('/kontak', function () {
    return view('page.contact');
})->name('contact-section');

// ===========================
// Media Publik
// ===========================
Route::get('/file-download', [MediaController::class, 'publicIndex'])->name('media.publik');

// ===========================
// Admin (Autentikasi Diperlukan)
// ===========================
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Resources
    Route::resource('users', UserController::class);
    Route::resource('kategoris', KategoriController::class);
    Route::resource('menus', MenuController::class);
    Route::resource('galeri', GaleriController::class);
    Route::resource('infos', InfoController::class);

    // Media
    Route::resource('admin/media', MediaController::class)->names('media');

    // Kontak
    Route::prefix('admin/kontak')->group(function () {
        Route::get('/', [KontakController::class, 'index'])->name('contacts.index');
        Route::get('/create', [KontakController::class, 'create'])->name('contacts.create');
        Route::post('/', [KontakController::class, 'store'])->name('contacts.store');
        Route::get('/{id}/edit', [KontakController::class, 'edit'])->name('contacts.edit');
        Route::put('/{id}', [KontakController::class, 'update'])->name('contacts.update');
        Route::delete('/{id}', [KontakController::class, 'destroy'])->name('contacts.destroy');
    });

    // Halaman Statis Admin
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('pages', PageController::class);
    });

    // Halmaman Kategori Publik
    Route::get('/kategori/{slug}', [KategoriController::class, 'showpublik'])->name('kategoris.showpublik');

});

// ===========================
// Auth Routes
// ===========================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ===========================
// Fallback Slug — jika URL tidak cocok dengan yang lain
// (berfungsi untuk menampilkan halaman dinamis selain /halaman/...)
// ===========================
Route::get('/{slug}', [FrontendController::class, 'show'])
    ->where('slug', '^(?!halaman|admin|login|logout|dashboard|media|galeri|kontak|informasi|infos|file-download|pages|publik).*$')
    ->name('slug.show');

    
//|--------------------------------------------------------------------------
//| ROUTES UNTUK PUBLIK
//|--------------------------------------------------------------------------
Route::prefix('publik')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('publik.login');
    Route::post('login', [LoginController::class, 'login'])->name('publik.login.post');
    Route::post('logout', [LoginController::class, 'logout'])->name('publik.logout');

    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('publik.register');
    Route::post('register', [RegisterController::class, 'register'])->name('publik.register.post');

    Route::get('dashboard', function () {
        return view('publik.dashboard.dashboard'); // 👉 bikin file resources/views/publik/dashboard/dashboard.blade.php
    })->name('publik.dashboard')->middleware('auth:publik');
});


