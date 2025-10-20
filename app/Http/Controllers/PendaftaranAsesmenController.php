<?php

namespace App\Http\Controllers;

use App\Models\PendaftaranAsesmen;
use App\Models\BiodataAsesi;
use App\Models\DokumenAsesi;
use App\Models\UnitKompetensi;
use App\Models\JadwalAsesmen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class PendaftaranAsesmenController extends Controller
{
    public function index()
    {
        $asesmens = PendaftaranAsesmen::with(['biodata', 'dokumen', 'units', 'jadwal'])
            ->latest()
            ->paginate(10);

        return view('asesi.asesmen.index', compact('asesmens'));
    }

   public function create()
{
    $biodata = BiodataAsesi::where('user_id', auth()->id())->first();
    $dokumen = DokumenAsesi::where('user_id', auth()->id())->first();
    $units   = UnitKompetensi::all();
    $asesmen = new PendaftaranAsesmen(); // <-- tambahkan ini

    if (!$biodata) {
        return redirect()->route('asesi.biodata')
            ->with('error', 'Silakan lengkapi biodata terlebih dahulu sebelum mendaftar asesmen.');
    }

    // untuk sekarang tidak ada auto TUK
    return view('asesi.asesmen.form', compact('biodata', 'dokumen', 'units', 'asesmen'));
}

public function store(Request $request)
{
    $request->validate([
        'biodata_asesi_id'   => 'required|exists:biodata_asesi,id',
        'dokumen_asesi_id'   => 'nullable|exists:dokumen_asesi,id',
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

    // Ambil data yang bisa diisi
    $data = $request->only([
        'biodata_asesi_id',
        'dokumen_asesi_id',
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

    // Upload file jika ada
    if ($request->hasFile('bukti_pembayaran')) {
        $file = $request->file('bukti_pembayaran');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('bukti_pembayaran', $filename, 'public');
        $data['bukti_pembayaran'] = 'bukti_pembayaran/' . $filename;
    }

    // Simpan record utama
    $asesmen = PendaftaranAsesmen::create($data);

    // Cek ID sebelum sync pivot
    if($asesmen && $asesmen->id){
        $asesmen->units()->sync($request->unit_ids);
    } else {
        return back()->with('error', 'Gagal menyimpan pendaftaran asesmen.');
    }

    return redirect()->route('asesi.asesmen.index')
        ->with('success', 'Pendaftaran asesmen berhasil ditambahkan.');
}

    public function show(PendaftaranAsesmen $asesmen)
    {
        $asesmen->load(['biodata', 'dokumen', 'units', 'jadwal']);
        return view('asesi.asesmen.show', compact('asesmen'));
    }

public function edit(PendaftaranAsesmen $asesmen)
{
    $asesmen->load(['units', 'jadwal']);

    // Ambil biodata & dokumen milik user
    $biodata = $asesmen->biodata ?? BiodataAsesi::where('user_id', auth()->id())->first();
    $dokumen = $asesmen->dokumen ?? DokumenAsesi::where('user_id', auth()->id())->first();
    $units   = UnitKompetensi::all();
    $jadwal  = JadwalAsesmen::all(); // tambahkan ini jika jadwal dipilih dari dropdown

    return view('asesi.asesmen.form', compact('asesmen', 'biodata', 'dokumen', 'units', 'jadwal'));
}



    public function update(Request $request, PendaftaranAsesmen $asesmen)
{
    $request->validate([
        'biodata_asesi_id'   => 'required|exists:biodata_asesi,id',
        'dokumen_asesi_id'   => 'nullable|exists:dokumen_asesi,id',
        'tujuan_asesmen'     => 'required|string',
        'tuk'                => 'nullable|string|max:150',
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


    // Upload file baru & hapus lama jika ada
    if ($request->hasFile('bukti_pembayaran')) {
        if ($asesmen->bukti_pembayaran && Storage::disk('public')->exists($asesmen->bukti_pembayaran)) {
            Storage::disk('public')->delete($asesmen->bukti_pembayaran);
        }
        $file = $request->file('bukti_pembayaran');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('bukti_pembayaran', $filename, 'public');
        $data['bukti_pembayaran'] = 'bukti_pembayaran/' . $filename;
    }

    // Update record utama
    $asesmen->update($data);

    // Sync pivot units (pastikan $asesmen->id ada)
    if($asesmen && $asesmen->id){
        $asesmen->units()->sync($request->unit_ids);
    }

    return redirect()->route('asesi.asesmen.index')
        ->with('success', 'Pendaftaran asesmen berhasil diperbarui.');
}

    public function destroy(PendaftaranAsesmen $asesmen)
    {
        if ($asesmen->bukti_pembayaran && Storage::disk('public')->exists($asesmen->bukti_pembayaran)) {
            Storage::disk('public')->delete($asesmen->bukti_pembayaran);
        }

        $asesmen->delete();

        return redirect()->route('asesi.asesmen.index')
            ->with('success', 'Pendaftaran asesmen berhasil dihapus.');
    }

    public function listJadwal()
    {
        $today = Carbon::today()->toDateString();

        $jadwals = JadwalAsesmen::with('skema')
            ->whereDate('tanggal_asesmen', $today)
            ->orderBy('tanggal_asesmen', 'asc')
            ->get();

        return view('asesi.asesmen.list_jadwal', compact('jadwals', 'today'));
    }
}
