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
use App\Models\Download;

/*
|--------------------------------------------------------------------------
| FRONTEND ROUTES
|--------------------------------------------------------------------------
*/

// Halaman utama
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/beranda', fn() => redirect()->route('home'))->name('website');

// Informasi Publik (artikel)
Route::prefix('informasi')->group(function () {
    Route::get('/artikel', [PublicInfoController::class, 'index'])->name('informasi.artikel.index');
    Route::get('/artikel/{slug}', [PublicInfoController::class, 'show'])->name('informasi.artikel.detail');
    Route::get('/kategori/{slug}', [PublicInfoController::class, 'kategori'])->name('informasi.artikel.kategori');
});

// Skema Sertifikasi
Route::get('/skema-sertifikasi', [FrontendController::class, 'skemaIndex'])->name('frontend.skema.index');
Route::get('/skema/{id}', [FrontendController::class, 'skemaDetail'])->name('frontend.skema.detail');

// Halaman Publik by Slug
Route::get('/page/{slug}', [FrontendController::class, 'showPage'])->name('page.show');

// Kontak Publik
Route::get('/kontak', [FrontendController::class, 'showKontak'])->name('kontak');
Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.submit');

// Downloads Publik
Route::get('/unduh', function () {
    $downloads = Download::where('status', 'published')->orderBy('created_at', 'desc')->paginate(10);
    return view('frontend.downloads.index', compact('downloads'));
})->name('downloads.public');

Route::get('/unduh/{slug}', function ($slug) {
    $download = Download::where('slug', $slug)->firstOrFail();
    $download->increment('download_count');
    return response()->download(storage_path("app/public/" . $download->file_path));
})->name('downloads.file');


/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES (auth required)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD
    Route::resource('users', UserController::class);
    Route::resource('kategoris', KategoriController::class);
    Route::resource('menus', MenuController::class);
    Route::resource('galeri', GaleriController::class);
    Route::resource('infos', InfoController::class);
    Route::resource('media', MediaController::class);

    // Kontak (admin)
    Route::prefix('kontak')->name('contacts.')->group(function () {
        Route::get('/', [KontakController::class, 'index'])->name('index');
        Route::get('/create', [KontakController::class, 'create'])->name('create');
        Route::post('/', [KontakController::class, 'storeAdmin'])->name('store');
        Route::get('/{id}/edit', [KontakController::class, 'edit'])->name('edit');
        Route::put('/{id}', [KontakController::class, 'update'])->name('update');
        Route::delete('/{id}', [KontakController::class, 'destroy'])->name('destroy');
    });

    // Halaman statis
    Route::resource('pages', PageController::class);

    // Skema & Unit Kompetensi
    Route::resource('skema', AdminSkemaController::class)->except(['show']);
    Route::resource('unit', AdminUnitKompetensiController::class)->except(['show']);
});


/*
|--------------------------------------------------------------------------
| MULTI ROLE DASHBOARD
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/asesor/dashboard', [\App\Http\Controllers\AsesorController::class, 'index'])->name('asesor.dashboard');
    Route::get('/asesi/dashboard', [\App\Http\Controllers\AsesiController::class, 'index'])->name('asesi.dashboard');
    
});
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});



/*
|--------------------------------------------------------------------------
| FALLBACK SLUG
|--------------------------------------------------------------------------
*/
Route::get('/{slug}', [FrontendController::class, 'show'])
    ->where('slug', '^(?!halaman|admin|login|logout|dashboard|media|galeri|kontak|informasi|infos|file-download|pages|publik).*$')
    ->name('slug.show');
