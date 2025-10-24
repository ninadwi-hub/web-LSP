<?php

namespace App\Http\Controllers;

use App\Models\PendaftaranAsesmen;
use App\Models\BiodataAsesi;
use App\Models\DokumenAsesi;
use App\Models\UnitKompetensi;
use App\Models\JadwalAsesmen;
use App\Models\Tuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PendaftaranAsesmenController extends Controller
{
    public function index()
    {
        $asesmens = PendaftaranAsesmen::with(['biodata', 'dokumen', 'units', 'jadwal.skema'])
            ->whereHas('biodata', function ($q) {
                $q->where('user_id', Auth::id());
            })
            ->latest()
            ->paginate(10);

        return view('asesi.asesmen.index', compact('asesmens'));
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
        'unit_ids'           => 'required|array',
        'jumlah_pembayaran'  => 'nullable|numeric',
        'sumber_pendanaan'   => 'nullable|string',
        'metode_pembayaran'  => 'nullable|string',
        'no_rekening'        => 'nullable|string|max:50',
        'nama_rekening'      => 'nullable|string|max:100',
        'tanggal_pembayaran' => 'nullable|date',
        'bukti_pembayaran'   => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ]);

    // 🔹 Simpan data teknis sebagai JSON
    $keteranganTeknis = [
    'ruang_uji' => $request->ruang_uji,
    'meja' => $request->meja,
    'kursi' => $request->kursi,
    'suhu' => $request->suhu,
    'lampu' => $request->lampu,
    'pc' => $request->pc,
    'aplikasi' => $request->aplikasi,
    'hp' => $request->hp,
];

    $data = $request->only([
        'biodata_asesi_id',
        'dokumen_asesi_id',
        'jadwal_id',
        'tujuan_asesmen',
        'tuk',
        'jadwal_uji',
        'metode_uji',
        'jumlah_pembayaran',
        'sumber_pendanaan',
        'metode_pembayaran',
        'no_rekening',
        'nama_rekening',
        'tanggal_pembayaran',
    ]);

    $data['keterangan_teknis'] = json_encode($keteranganTeknis, JSON_UNESCAPED_UNICODE);
    $data['status'] = 'Pra Asesmen';

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
        $asesmen->load(['biodata', 'dokumen', 'units', 'jadwal.skema']);
        return view('asesi.asesmen.show', compact('asesmen'));
    }

    public function edit(PendaftaranAsesmen $asesmen)
    {
        $asesmen->load(['units', 'jadwal']);
        $biodata = $asesmen->biodata ?? BiodataAsesi::where('user_id', auth()->id())->first();
        $dokumen = $asesmen->dokumen ?? DokumenAsesi::where('user_id', auth()->id())->first();
        $units   = UnitKompetensi::all();
        $jadwals = JadwalAsesmen::with('skema')->get();
        $tuks    = Tuk::all();

        return view('asesi.asesmen.form', compact('asesmen', 'biodata', 'dokumen', 'units', 'jadwals', 'tuks'));
    }

    public function update(Request $request, PendaftaranAsesmen $asesmen)
{
    $request->validate([
        'biodata_asesi_id'   => 'required|exists:biodata_asesi,id',
        'dokumen_asesi_id'   => 'nullable|exists:dokumen_asesi,id',
        'jadwal_id'          => 'required|exists:jadwal_asesmens,id',
        'tujuan_asesmen'     => 'required|string',
        'tuk'                => 'nullable|string|max:150',
        'jadwal_uji'         => 'nullable|date',
        'metode_uji'         => 'nullable|string',
        'unit_ids'           => 'required|array',
        'jumlah_pembayaran'  => 'nullable|numeric',
        'sumber_pendanaan'   => 'nullable|string',
        'metode_pembayaran'  => 'nullable|string',
        'no_rekening'        => 'nullable|string|max:50',
        'nama_rekening'      => 'nullable|string|max:100',
        'tanggal_pembayaran' => 'nullable|date',
        'bukti_pembayaran'   => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ]);

    // 🔹 Simpan data teknis sebagai JSON
   $keteranganTeknis = [
    'ruang_uji' => $request->ruang_uji,
    'meja' => $request->meja,
    'kursi' => $request->kursi,
    'suhu' => $request->suhu,
    'lampu' => $request->lampu,
    'pc' => $request->pc,
    'aplikasi' => $request->aplikasi,
    'hp' => $request->hp,
];


    $data = $request->only([
        'biodata_asesi_id',
        'dokumen_asesi_id',
        'jadwal_id',
        'tujuan_asesmen',
        'tuk',
        'jadwal_uji',
        'metode_uji',
        'jumlah_pembayaran',
        'sumber_pendanaan',
        'metode_pembayaran',
        'no_rekening',
        'nama_rekening',
        'tanggal_pembayaran',
    ]);

    $data['keterangan_teknis'] = json_encode($keteranganTeknis, JSON_UNESCAPED_UNICODE);

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
            ->whereDate('tanggal_asesmen', '>=', $today)
            ->orderBy('tanggal_asesmen', 'asc')
            ->get();

        return view('asesi.asesmen.list_jadwal', compact('jadwals', 'today'));
    }
}
