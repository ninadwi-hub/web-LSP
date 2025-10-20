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
use App\Http\Controllers\TukController;
use App\Models\Download;
use Illuminate\Support\Facades\Http;
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

//kab and prov
Route::get('/get-kabupaten/{id}', function ($id) {
    $response = Http::get("https://ibnux.github.io/data-indonesia/kabupaten/$id.json");
    return $response->json();
});

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


    Route::get('/tuk', [TukController::class, 'index'])->name('tuk.index');
    Route::post('/tuk', [TukController::class, 'store'])->name('tuk.store');
    Route::delete('/tuk/{tuk}', [TukController::class, 'destroy'])->name('tuk.destroy');

    /*
 * === DASHBOARD ===
 */
    Route::get('/asesi/dashboard', [AsesiController::class, 'index'])
        ->name('asesi.dashboard');

    Route::get('/asesor/dashboard', [AsesiController::class, 'index'])
        ->name('asesor.dashboard');

    /*
 * === FORM BIODATA (single controller, multi-route aliases) ===
 */

    // Compatibility / alias routes — banyak view/calls mungkin pakai nama ini:
    Route::get('/asesi/biodata', [AsesiController::class, 'biodataForm'])
        ->name('asesi.biodata');
    Route::post('/asesi/biodata', [AsesiController::class, 'storeBiodata'])
        ->name('asesi.biodata.store');

    Route::get('/asesor/biodata', [AsesiController::class, 'biodataForm'])
        ->name('asesor.biodata');
    Route::post('/asesor/biodata', [AsesiController::class, 'storeBiodata'])
        ->name('asesor.biodata.store');

    /*
 * === SWITCH ROLE ===
 */
    Route::get('/switch-role/{role}', [AsesiController::class, 'switchRole'])
        ->name('switch.role');

  Route::middleware(['auth'])->prefix('asesi/asesmen')->name('asesi.asesmen.')->group(function () {
    Route::get('/', [PendaftaranAsesmenController::class, 'index'])->name('index');
    Route::get('/create', [PendaftaranAsesmenController::class, 'create'])->name('create');
    Route::post('/', [PendaftaranAsesmenController::class, 'store'])->name('store');
    Route::get('/list_jadwal', [PendaftaranAsesmenController::class, 'listJadwal'])->name('list_jadwal');

    // Pindahkan ke bawah setelah semua yang spesifik
    Route::get('/{asesmen}/edit', [PendaftaranAsesmenController::class, 'edit'])->name('edit');
    Route::put('/{asesmen}', [PendaftaranAsesmenController::class, 'update'])->name('update');
    Route::delete('/{asesmen}', [PendaftaranAsesmenController::class, 'destroy'])->name('destroy');
    Route::get('/{asesmen}', [PendaftaranAsesmenController::class, 'show'])->name('show');
});


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

    // ========== ADMINISTRASI UJK (SuperAdmin) ==========
    use App\Http\Controllers\Sa\AdministrasiUjkController;

    Route::prefix('sa/sertifikasi')->name('sa.sertifikasi.')->group(function () {
        Route::get('/administrasi_ujk', [AdministrasiUjkController::class, 'index'])->name('administrasi_ujk.index');
    });


    /*
    |--------------------------------------------------------------------------
    | SUPERADMIN - SERTIFIKASI
    |--------------------------------------------------------------------------
    */
    Route::prefix('sa/sertifikasi')->name('sa.sertifikasi.')->group(function () {
        // Administrasi UJK
        Route::get('/administrasi_ujk', [AdministrasiUjkController::class, 'index'])
            ->name('administrasi_ujk.index');
        Route::get('/administrasi_ujk/{id}/edit', [AdministrasiUjkController::class, 'edit'])
            ->name('administrasi_ujk.edit');
        Route::get('/administrasi_ujk/export', [AdministrasiUjkController::class, 'exportExcel'])
            ->name('administrasi_ujk.export');
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

    Route::get('/riwayat', function () {
        abort(404);
    })->name('riwayat');
});
/// Asesor ROUTESS
Route::prefix('asesor')->name('asesor.')->group(function () {

    Route::get('/riwayat', function () {
        abort(404);
    })->name('riwayat');
     Route::get('/asesmen', function () {
        abort(404);
    })->name('asesmen');

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
Route::middleware(['auth'])->prefix('asesi')->name('asesi.')->group(function () {
    // 1 route untuk semua FR (APL.01, APL.02, AK.01, AK.03)
    Route::get('/{form}/{asesmen}', [App\Http\Controllers\FormFRController::class, 'show'])
        ->where('form', 'apl01|apl02|ak01|ak03')
        ->name('fr.show');
});
