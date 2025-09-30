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
<<<<<<< HEAD
use App\Http\Controllers\Admin\SkemaController as AdminSkemaController;
use App\Http\Controllers\Admin\UnitKompetensiController as AdminUnitKompetensiController;
use App\Http\Controllers\DashboardSAController;
use App\Models\Download;

// ===========================
// Auth Routes
// ===========================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ===========================
// PUBLIC ROUTES
// ===========================

// Home
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/beranda', fn() => redirect()->route('home'))->name('website');

// Kontak Publik
Route::get('/kontak', [FrontendController::class, 'showKontak'])->name('kontak');
Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.submit');

// Informasi/Artikel Publik
Route::get('/informasi/artikel', [PublicInfoController::class, 'index'])->name('informasi.artikel.index');
Route::get('/informasi/artikel/{slug}', [PublicInfoController::class, 'show'])->name('informasi.artikel.detail');
Route::get('/informasi/kategori/{slug}', [PublicInfoController::class, 'kategori'])->name('informasi.artikel.kategori');

// Skema Sertifikasi Publik
Route::get('/home/skema_sertifikasi', [FrontendController::class, 'skemaSertifikasi'])->name('skema.index');
Route::get('/home/skema_sertifikasi/detail/{id}', [FrontendController::class, 'skemaDetail'])->name('skema.detail');
Route::get('/skema-sertifikasi', [FrontendController::class, 'skemaIndex'])->name('frontend.skema.index');
Route::get('/skema/{id}', [FrontendController::class, 'skemaDetail'])->name('frontend.skema.detail');

// Download Publik
Route::get('/unduh', function() {
    $downloads = Download::where('status','published')->orderBy('created_at','desc')->paginate(10);
    return view('frontend.downloads.index', compact('downloads'));
})->name('downloads.public');

Route::get('/unduh/{slug}', function($slug) {
    $download = Download::where('slug',$slug)->firstOrFail();
    $download->increment('download_count');
    return response()->download(storage_path("app/public/".$download->file_path));
})->name('downloads.file');

// Halaman Statis Publik
Route::get('/page/{slug}', [FrontendController::class, 'showPage'])->name('page.show');

// ===========================
// PROTECTED ROUTES (Auth Required)
// ===========================
Route::middleware(['auth'])->group(function () {

    // ===========================
    // DASHBOARD ROUTING
    // ===========================
    Route::get('/dashboard', function () {
        $user = Auth::user();
        if ($user && $user->name === 'superadmin') {
            return redirect()->route('dashboardSA');
        }
        return redirect()->route('admin.dashboard');
    })->name('dashboard');

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/dashboardSA', [DashboardSAController::class, 'index'])->name('dashboardSA');

    // ===========================
    // ADMIN ROUTES
    // ===========================
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('info', InfoController::class);
        Route::resource('downloads', \App\Http\Controllers\Admin\DownloadController::class);
        Route::resource('pages', PageController::class);
        Route::resource('media', MediaController::class);
        Route::resource('menus', MenuController::class);
    });

    // ===========================
    // KONTAK ROUTES (Outside admin.* namespace)
    // ===========================
    Route::prefix('admin/kontak')->group(function () {
        Route::get('/', [KontakController::class, 'index'])->name('contacts.index');
        Route::get('/create', [KontakController::class, 'create'])->name('contacts.create');
        Route::post('/', [KontakController::class, 'storeAdmin'])->name('contacts.store');
        Route::get('/{id}/edit', [KontakController::class, 'edit'])->name('contacts.edit');
        Route::put('/{id}', [KontakController::class, 'update'])->name('contacts.update');
        Route::delete('/{id}', [KontakController::class, 'destroy'])->name('contacts.destroy');
    });

    // ===========================
    // PANEL ROUTES (Skema & Unit)
    // ===========================
    Route::prefix('panell')->name('panell.')->group(function () {
        Route::resource('skema', AdminSkemaController::class)->except(['show']);
        Route::resource('unit', AdminUnitKompetensiController::class)->except(['show']);
    });

    // ===========================
    // ASESI ROUTES
    // ===========================
    Route::prefix('asesi')->name('asesi.')->group(function () {
        // Route::get('/biodata', [BiodataController::class, 'index'])->name('biodata');
        // Route::post('/biodata', [BiodataController::class, 'update'])->name('biodata.update');
    });

    // ===========================
    // RESOURCE ROUTES
    // ===========================
    Route::resource('users', UserController::class);
    Route::resource('kategoris', KategoriController::class);
    Route::resource('galeri', GaleriController::class);
    Route::resource('infos', InfoController::class);

    // Kategori Publik
    Route::get('/kategori/{slug}', [KategoriController::class, 'showpublik'])->name('kategoris.showpublik');

    // ===========================
    // SUPERADMIN ROUTES (Prefix: sa)
    // ===========================
    Route::prefix('sa')->name('sa.')->group(function () {
        
        // PERSIAPAN
        Route::prefix('persiapan')->name('persiapan.')->group(function () {
            Route::get('/tuk', function() {
                return view('superadmin.persiapan.tuk.index');
            })->name('tuk');
            
            Route::get('/asesor', function() {
                return view('superadmin.persiapan.asesor.index');
            })->name('asesor');
            
            Route::get('/jadwal', function() {
                return view('superadmin.persiapan.jadwal.index');
            })->name('jadwal');
        });
        
        // SERTIFIKASI
        Route::prefix('sertifikasi')->name('sertifikasi.')->group(function () {
            Route::get('/pendaftaran', function() {
                return view('superadmin.sertifikasi.pendaftaran.index');
            })->name('pendaftaran');
            
            Route::get('/verifikasi', function() {
                return view('superadmin.sertifikasi.verifikasi.index');
            })->name('verifikasi');
        });
        
        // DATA DICTIONARY
        Route::prefix('dictionary')->name('dictionary.')->group(function () {
            Route::get('/provinsi', function() {
                return view('superadmin.dictionary.provinsi.index');
            })->name('provinsi');
            
            Route::get('/kabupaten', function() {
                return view('superadmin.dictionary.kabupaten.index');
            })->name('kabupaten');
            
            Route::get('/kecamatan', function() {
                return view('superadmin.dictionary.kecamatan.index');
            })->name('kecamatan');
            
            Route::get('/kelurahan', function() {
                return view('superadmin.dictionary.kelurahan.index');
            })->name('kelurahan');
        });
        
        // PERANGKAT ASESMEN
        Route::prefix('asesmen')->name('asesmen.')->group(function () {
            Route::get('/apl01', function() {
                return view('superadmin.asesmen.apl01.index');
            })->name('apl01');
            
            Route::get('/apl02', function() {
                return view('superadmin.asesmen.apl02.index');
            })->name('apl02');
            
            Route::get('/mak', function() {
                return view('superadmin.asesmen.mak.index');
            })->name('mak');
            
            Route::get('/ceklis', function() {
                return view('superadmin.asesmen.ceklis.index');
            })->name('ceklis');
        });
        
        // REPORT
        Route::prefix('report')->name('report.')->group(function () {
            Route::get('/asesi', function() {
                return view('superadmin.report.asesi');
            })->name('asesi');
            
            Route::get('/asesmen', function() {
                return view('superadmin.report.asesmen');
            })->name('asesmen');
            
            Route::get('/sertifikat', function() {
                return view('superadmin.report.sertifikat');
            })->name('sertifikat');
            
            Route::get('/keuangan', function() {
                return view('superadmin.report.keuangan');
            })->name('keuangan');
            
            Route::get('/statistik', function() {
                return view('superadmin.report.statistik');
            })->name('statistik');
        });
        
        // SETTINGS
        Route::prefix('settings')->name('settings.')->group(function () {
            Route::get('/roles', function() {
                return view('superadmin.settings.roles.index');
            })->name('roles');
            
            Route::get('/company', function() {
                return view('superadmin.settings.company');
            })->name('company');
            
            Route::get('/email', function() {
                return view('superadmin.settings.email');
            })->name('email');
            
            Route::get('/backup', function() {
                return view('superadmin.settings.backup');
            })->name('backup');
            
            Route::get('/logs', function() {
                return view('superadmin.settings.logs');
            })->name('logs');
        });
        
    });
});

// ===========================
// FALLBACK ROUTE - Paling Bawah
// ===========================
Route::get('/{slug}', [FrontendController::class, 'show'])
    ->where('slug', '^(?!halaman|admin|login|logout|dashboard|media|galeri|kontak|informasi|infos|file-download|pages|publik|unduh|skema|asesi|panell|sa).*$')
    ->name('slug.show');
=======
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
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});



/*
|--------------------------------------------------------------------------
| FALLBACK SLUG
|--------------------------------------------------------------------------
*/
Route::get('/{slug}', [FrontendController::class, 'show'])
    ->where('slug', '^(?!halaman|admin|login|logout|dashboard|media|galeri|kontak|informasi|infos|file-download|pages|publik).*$')
    ->name('slug.show');
>>>>>>> 7b10650a7f8560fcf8a9656db74811686325dd35
