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
        $asesmens = PendaftaranAsesmen::with(['biodata', 'dokumen', 'units', 'jadwal', 'tuk'])
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
        'biodata_id'        => 'required|exists:biodata_asesi,id',
        'dokumen_id'        => 'nullable|exists:dokumen_asesi,id',
        'tujuan_asesmen'    => 'required|string',
        'tuk'               => 'required|string|max:150', // wajib diisi manual
        'jadwal_uji'        => 'nullable|date',
        'metode_uji'        => 'nullable|string',
        'keterangan_teknis' => 'nullable|string',
        'unit_ids'          => 'required|array',
        'jumlah_pembayaran' => 'nullable|numeric',
        'sumber_pendanaan'  => 'nullable|string',
        'metode_pembayaran' => 'nullable|string',
        'no_rekening'       => 'nullable|string|max:50',
        'nama_rekening'     => 'nullable|string|max:100',
        'tanggal_pembayaran'=> 'nullable|date',
        'bukti_pembayaran'  => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ]);

    $data = $request->only([
        'biodata_id',
        'dokumen_id',
        'tujuan_asesmen',
        'tuk', // langsung dari input manual
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

    $asesmen = PendaftaranAsesmen::create($data);
    $asesmen->units()->sync($request->unit_ids);

    return redirect()->route('asesi.asesmen.index')
        ->with('success', 'Pendaftaran asesmen berhasil ditambahkan.');
}


    public function show(PendaftaranAsesmen $asesmen)
    {
        $asesmen->load(['biodata', 'dokumen', 'units', 'jadwal', 'tuk']);
        return view('asesi.asesmen.show', compact('asesmen'));
    }

public function edit(PendaftaranAsesmen $asesman)
{
    $asesman->load(['units', 'jadwal']); // kalau ada relasi
    $biodata = $asesman->biodata;
    $dokumen = $asesman->dokumen;
    $units   = UnitKompetensi::all();

    // kirim ke view
    return view('asesi.asesmen.form', [
        'asesmen' => $asesman, // ini penting, bukan new PendaftaranAsesmen()
        'biodata' => $biodata,
        'dokumen' => $dokumen,
        'units'   => $units,
    ]);
}


    public function update(Request $request, PendaftaranAsesmen $asesmen)
    {
        $request->validate([
            'tujuan_asesmen'    => 'required|string',
            'tuk'               => 'nullable|string',
            'jadwal_uji'        => 'nullable|date',
            'metode_uji'        => 'nullable|string',
            'keterangan_teknis' => 'nullable|string',
            'unit_ids'          => 'required|array',
            'jumlah_pembayaran' => 'nullable|numeric',
            'sumber_pendanaan'  => 'nullable|string',
            'metode_pembayaran' => 'nullable|string',
            'no_rekening'       => 'nullable|string|max:50',
            'nama_rekening'     => 'nullable|string|max:100',
            'tanggal_pembayaran'=> 'nullable|date',
            'bukti_pembayaran'  => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $data = $request->only([
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

        // Jika ada file baru, hapus lama & upload baru
        if ($request->hasFile('bukti_pembayaran')) {
            if ($asesmen->bukti_pembayaran && Storage::disk('public')->exists($asesmen->bukti_pembayaran)) {
                Storage::disk('public')->delete($asesmen->bukti_pembayaran);
            }
            $file = $request->file('bukti_pembayaran');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('bukti_pembayaran', $filename, 'public');
            $data['bukti_pembayaran'] = 'bukti_pembayaran/' . $filename;
        }

        $asesmen->update($data);
        $asesmen->units()->sync($request->unit_ids);

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
