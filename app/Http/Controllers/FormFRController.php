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
    $allowed = ['apl01', 'apl02', 'ak01', 'ak02', 'ak03'];
    if (!in_array($form, $allowed)) {
        abort(404, 'Form tidak ditemukan');
    }

    $asesmen = PendaftaranAsesmen::with(['biodata', 'dokumen', 'units', 'jadwal'])
                ->findOrFail($id);

    $biodata = $asesmen->biodata ?? BiodataAsesi::where('user_id', Auth::id())->first();
    $dokumen = $asesmen->dokumen ?? DokumenAsesi::where('user_id', Auth::id())->first();
    $asesor = $asesmen->asesor ?? null;

    $viewPath = "asesi.from.fr_{$form}";
    if (!view()->exists($viewPath)) {
        abort(404, "View untuk form $form belum dibuat");
    }

    return view($viewPath, compact('asesmen', 'biodata', 'dokumen', 'asesor'));
}

public function create($jadwal_id = null)
{
    $biodata = BiodataAsesi::where('user_id', auth()->id())->first();
    $dokumen = DokumenAsesi::where('user_id', auth()->id())->first();
    $units   = UnitKompetensi::all();
    $tuks    = Tuk::all();

    // ✅ Ambil semua jadwal (untuk dropdown misalnya)
    $jadwals = JadwalAsesmen::with('skema')->get();

    // ✅ Jika user datang lewat /create/{jadwal_id}, ambil data spesifik jadwal itu
    $selectedJadwal = null;
    if ($jadwal_id) {
        $selectedJadwal = JadwalAsesmen::with('skema')->find($jadwal_id);
    }

    $asesmen = new PendaftaranAsesmen();

    if (!$biodata) {
        return redirect()->route('asesi.biodata')
            ->with('error', 'Silakan lengkapi biodata terlebih dahulu sebelum mendaftar asesmen.');
    }

    return view('asesi.asesmen.form', compact(
        'biodata',
        'dokumen',
        'units',
        'tuks',
        'jadwals',
        'selectedJadwal',
        'asesmen'
    ));
}


    public function store(Request $request)
    {
        $request->validate([
            'biodata_asesi_id'   => 'required|exists:biodata_asesi,id',
            'dokumen_asesi_id'   => 'nullable|exists:dokumen_asesi,id',
            'jadwal_id'          => 'required|exists:jadwal_asesmens,id',
            'tujuan_asesmen'     => 'required|string',
            'tuk'                => 'required|string|max:150',
            'jadwal_uji'         => 'nullable|date',
            'metode_uji'         => 'nullable|string',
            'keterangan_teknis'  => 'nullable|string',
            'unit_ids'           => 'required|array',
            'jumlah_pembayaran'  => 'nullable|numeric',
            'sumber_pendanaan'   => 'nullable|string',
            'metode_pembayaran'  => 'nullable|string',
            'no_rekening'        => 'nullable|string|max:50',
            'nama_rekening'      => 'nullable|string|max:100',
            'tanggal_pembayaran' => 'nullable|date',
            'bukti_pembayaran'   => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $data = $request->only([
            'biodata_asesi_id',
            'dokumen_asesi_id',
            'jadwal_id',
            'tujuan_asesmen',
            'tuk',
            'jadwal_uji',
            'metode_uji',
            'keterangan_teknis',
            'jumlah_pembayaran',
            'sumber_pendanaan',
            'metode_pembayaran',
            'no_rekening',
            'nama_rekening',
            'tanggal_pembayaran',
        ]);

        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('bukti_pembayaran', $filename, 'public');
            $data['bukti_pembayaran'] = 'bukti_pembayaran/' . $filename;
        }

        // Tambahkan status awal
        $data['status'] = 'Pra Asesmen';

        $asesmen = PendaftaranAsesmen::create($data);

        if ($asesmen && $asesmen->id) {
            $asesmen->units()->sync($request->unit_ids);
        }

        return redirect()->route('asesi.asesmen.index')
            ->with('success', 'Pendaftaran asesmen berhasil ditambahkan.');
    }

}
