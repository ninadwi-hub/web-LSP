<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('/profil/sejarah-visi-&-misi', function () {
    return view('profil.sejarah-visi-&-misi');
});

Route::get('/profil/struktur-organisasi', function () {
    return view('profil.struktur-organisasi');
});

Route::get('/profil/wewenang-tugas-dan-fungsi', function () {
    return view('profil.wewenang-tugas-dan-fungsi');
});

Route::get('/profil/tugas-pokok-personal', function () {
    return view('profil.tugas-pokok-personal');
});

Route::get('/profil/program-kerja', function () {
    return view('profil.program-kerja');
});

