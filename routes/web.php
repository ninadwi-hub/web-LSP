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


// Publik - file download
Route::get('/unduh', [FrontendController::class, 'downloads'])->name('unduh.index');

// ADMIN
Route::prefix('admin')->middleware(['auth'])->group(function() {
    Route::resource('downloads', \App\Http\Controllers\Admin\DownloadController::class, ['as' => 'admin']);
});

// FRONTEND - daftar unduhan
use App\Models\Download;

Route::get('/unduh', function() {
    $downloads = Download::where('status','published')->orderBy('created_at','desc')->paginate(10);
    return view('frontend.downloads.index', compact('downloads'));
})->name('downloads.public');

// FRONTEND - file download
Route::get('/unduh/{slug}', function($slug) {
    $download = Download::where('slug',$slug)->firstOrFail();
    $download->increment('download_count');
    return response()->download(storage_path("app/public/".$download->file_path));
})->name('downloads.file');

// ==========================
// ROUTES INFORMASI PUBLIK
// ==========================

// List semua artikel → resources/views/info/show.blade.php
Route::get('/informasi/artikel', [PublicInfoController::class, 'index'])
    ->name('informasi.artikel.index');

// Detail artikel → resources/views/info/detail.blade.php
Route::get('/informasi/artikel/{slug}', [PublicInfoController::class, 'show'])
    ->name('informasi.artikel.detail');

// Artikel berdasarkan kategori → resources/views/info/show.blade.php
Route::get('/informasi/kategori/{slug}', [PublicInfoController::class, 'kategori'])
    ->name('informasi.artikel.kategori');

Route::resource('kategoris', KategoriController::class);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('info', \App\Http\Controllers\Admin\InfoController::class);
});


/// MENUSSS

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
Route::get('/skema-sertifikasi', [FrontendController::class, 'skemaSertifikasi'])->name('skema.sertifikasi');


Route::get('/page/{slug}', [FrontendController::class, 'page'])->name('page.show');

// ==================== ADMIN ====================
// Semua route admin di-prefix 'panell' dan pakai auth
Route::prefix('panell')->middleware(['auth'])->name('panell.')->group(function () {

    // CRUD Skema Sertifikasi
    Route::resource('skema', AdminSkemaController::class)->except(['show']);

    // CRUD Unit Kompetensi
    Route::resource('unit', AdminUnitKompetensiController::class)->except(['show']);
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
        Route::post('/', [KontakController::class, 'storeAdmin'])->name('contacts.store');
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




