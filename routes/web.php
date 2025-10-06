<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
use App\Http\Controllers\Admin\SkemaController as AdminSkemaController;
use App\Http\Controllers\Admin\UnitKompetensiController as AdminUnitKompetensiController;
use App\Http\Controllers\DashboardSAController;
use App\Http\Controllers\AsesorController;
use App\Http\Controllers\AsesiController;
use App\Http\Controllers\JadwalAsesmenController;
use App\Http\Controllers\TokenController;
use App\Models\Download;
use App\Http\Controllers\PendaftaranAsesmenController;

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
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/beranda', fn() => redirect()->route('home'))->name('website');

// Kontak Publik
Route::get('/kontak', [FrontendController::class, 'showKontak'])->name('kontak');
Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.submit');

// Informasi Publik
Route::prefix('informasi')->group(function () {
    Route::get('/artikel', [PublicInfoController::class, 'index'])->name('informasi.artikel.index');
    Route::get('/artikel/{slug}', [PublicInfoController::class, 'show'])->name('informasi.artikel.detail');
    Route::get('/kategori/{slug}', [PublicInfoController::class, 'kategori'])->name('informasi.artikel.kategori');
});

// Skema Sertifikasi Publik
Route::get('/skema-sertifikasi', [FrontendController::class, 'skemaIndex'])->name('frontend.skema.index');
Route::get('/skema/{id}', [FrontendController::class, 'skemaDetail'])->name('frontend.skema.detail');

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

// Halaman Statis Publik
Route::get('/page/{slug}', [FrontendController::class, 'showPage'])->name('page.show');

/*
|--------------------------------------------------------------------------
| PROTECTED ROUTES (Auth Required)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // Dashboard utama (cek role superadmin / admin)
    Route::get('/dashboard', function () {
        $user = Auth::user();
        if ($user && $user->name === 'superadmin') {
            return redirect()->route('dashboardSA');
        }
        return redirect()->route('admin.dashboard');
    })->name('dashboard');

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/dashboardSA', [DashboardSAController::class, 'index'])->name('dashboardSA');

    // Admin Routes
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('info', InfoController::class);
        Route::resource('downloads', \App\Http\Controllers\Admin\DownloadController::class);
        Route::resource('pages', PageController::class);
        Route::resource('media', MediaController::class);
        Route::resource('menus', MenuController::class);

        // Kontak
        Route::prefix('kontak')->name('contacts.')->group(function () {
            Route::get('/', [KontakController::class, 'index'])->name('index');
            Route::get('/create', [KontakController::class, 'create'])->name('create');
            Route::post('/', [KontakController::class, 'storeAdmin'])->name('store');
            Route::get('/{id}/edit', [KontakController::class, 'edit'])->name('edit');
            Route::put('/{id}', [KontakController::class, 'update'])->name('update');
            Route::delete('/{id}', [KontakController::class, 'destroy'])->name('destroy');
        });
    });

    // Panel (Skema & Unit)
    Route::prefix('panel')->name('panel.')->group(function () {
        Route::resource('skema', AdminSkemaController::class)->except(['show']);
        Route::resource('unit', AdminUnitKompetensiController::class)->except(['show']);
    });

    // Asesor & Asesi Dashboard
    Route::get('/asesor/dashboard', [AsesorController::class, 'index'])->name('asesor.dashboard');
    Route::get('/asesi/dashboard', [AsesiController::class, 'index'])->name('asesi.dashboard');
    Route::middleware(['auth'])->group(function () {
    Route::get('/asesi/biodata', [AsesiController::class, 'biodataForm'])->name('asesi.biodata');
    Route::post('/asesi/biodata', [AsesiController::class, 'storeBiodata'])->name('asesi.biodata.store');
});

    // Pendaftaran Asesmen
    Route::resource('asesmen', App\Http\Controllers\PendaftaranAsesmenController::class);

    // Resources tambahan
    Route::resource('users', UserController::class);
    Route::resource('kategoris', KategoriController::class);
    Route::resource('galeri', GaleriController::class);
    Route::resource('infos', InfoController::class);

    // Kategori Publik via slug
    Route::get('/kategori/{slug}', [KategoriController::class, 'showpublik'])->name('kategoris.showpublik');

    // Superadmin Routes
    Route::prefix('sa')->name('sa.')->group(function () {
        // persiapan, sertifikasi, dictionary, asesmen, report, settings
        // (saya biarkan sesuai struktur folder view yang kamu punya)
    });
});

/*
|--------------------------------------------------------------------------
| FALLBACK ROUTE
|--------------------------------------------------------------------------
*/
Route::get('/{slug}', [FrontendController::class, 'show'])
    ->where('slug', '^(?!halaman|admin|login|logout|dashboard|media|galeri|kontak|informasi|infos|file-download|pages|publik|unduh|skema|asesi|panel|sa).*$')
    ->name('slug.show');


    /// ASESI ROUTESS
    Route::prefix('asesi')->name('asesi.')->group(function () {

    Route::get('/asesmen', function () {
        abort(404);
    })->name('asesmen');

    Route::get('/riwayat', function () {
        abort(404);
    })->name('riwayat');

    Route::get('/praasesmen', function () {
        abort(404);
    })->name('praasesmen');
});




Route::prefix('sa/tokens')->name('sa.tokens.')->group(function () {
    Route::get('/', [TokenController::class, 'index'])->name('index');
    Route::post('/generate', [TokenController::class, 'generate'])->name('generate');
    Route::delete('/{id}', [TokenController::class, 'destroy'])->name('destroy');
});


// SuperAdmin → Persiapan
Route::prefix('sa/persiapan')->name('sa.persiapan.')->group(function () {
    Route::get('/jadwal', [JadwalAsesmenController::class, 'index'])->name('jadwal.index');
    Route::get('/jadwal/create', [JadwalAsesmenController::class, 'create'])->name('jadwal.create');
    Route::post('/jadwal', [JadwalAsesmenController::class, 'store'])->name('jadwal.store');
    Route::get('/jadwal/{jadwal}/edit', [JadwalAsesmenController::class, 'edit'])->name('jadwal.edit');
    Route::put('/jadwal/{jadwal}', [JadwalAsesmenController::class, 'update'])->name('jadwal.update');
    Route::delete('/jadwal/{jadwal}', [JadwalAsesmenController::class, 'destroy'])->name('jadwal.destroy');
});
