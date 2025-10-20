<?php

namespace App\Http\Controllers;

use App\Models\PendaftaranAsesmen;
use App\Models\BiodataAsesi;
use App\Models\DokumenAsesi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormFRController extends Controller
{
    /**
     * Menampilkan form FR (APL.01, APL.02, AK.01, AK.03)
     */
    public function show($form, $id)
    {
        // Validasi agar tidak sembarang akses
        $allowed = ['apl01', 'apl02', 'ak01', 'ak03'];
        if (!in_array($form, $allowed)) {
            abort(404, 'Form tidak ditemukan');
        }

        // Ambil data asesmen dengan relasinya
        $asesmen = PendaftaranAsesmen::with(['biodata', 'dokumen', 'units', 'jadwal'])
                    ->findOrFail($id);

        // Ambil data tambahan dari relasi
        $biodata = $asesmen->biodata ?? BiodataAsesi::where('user_id', Auth::id())->first();
        $dokumen = $asesmen->dokumen ?? DokumenAsesi::where('user_id', Auth::id())->first();

        // Jika ada relasi ke asesor
        $asesor = $asesmen->asesor ?? null;

        // Tentukan path view-nya
        $viewPath = "asesi.from.fr_{$form}";

        // Cek apakah view-nya tersedia
        if (!view()->exists($viewPath)) {
            abort(404, "View untuk form $form belum dibuat");
        }

        // Kirim semua data ke view
        return view($viewPath, compact('asesmen', 'biodata', 'dokumen', 'asesor'));
    }
}
