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
use App\Http\Controllers\GaleriPublikController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\InfoController;


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
// Galeri Publik
// ===========================
Route::get('/galeri/publik', [GaleriPublikController::class, 'index'])->name('galeri.publik');

// ===========================
// Kontak Publik
// ===========================
Route::get('/kontak', [FrontendController::class, 'showKontak'])->name('kontak');
Route::post('/kontak', [KontakController::class, 'submit'])->name('kontak.submit');

// ===========================
// Media Publik
// ===========================
Route::get('/file-download', [MediaController::class, 'publicIndex'])->name('media.publik');



// Public Info
Route::get('/info', [FrontendInfoController::class, 'index'])->name('public.info.indexp');
Route::get('/info/{slug}', [FrontendInfoController::class, 'show'])->name('public.info.show');

// Admin Info
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('info', InfoController::class);
});
Route::post('/admin/info', [InfoController::class, 'store'])->name('admin.info.store');
Route::get('/info', [InfoController::class, 'index'])->name('info.index');

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
    ->where('slug', '^(?!halaman|admin|login|logout|dashboard|media|galeri|kontak|informasi|infos|file-download|pages).*$')
    ->name('slug.show');
