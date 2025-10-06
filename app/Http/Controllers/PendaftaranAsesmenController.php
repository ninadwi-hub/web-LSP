<?php
namespace App\Http\Controllers;

use App\Models\PendaftaranAsesmen;
use App\Models\BiodataAsesi;
use App\Models\DokumenAsesi;
use App\Models\UnitKompetensi;
use Illuminate\Http\Request;

class PendaftaranAsesmenController extends Controller
{
    public function index()
    {
        $asesmens = PendaftaranAsesmen::with(['biodata','dokumen','units'])->latest()->paginate(10);
        return view('asesi.asesmen.index', compact('asesmens'));
    }

   public function create()
{
    $biodata = BiodataAsesi::where('user_id', auth()->id())->first();
    $dokumen = DokumenAsesi::where('user_id', auth()->id())->first();
    $units   = UnitKompetensi::all();

    if (!$biodata) {
        return redirect()->route('asesi.biodata')
            ->with('error', 'Silakan lengkapi biodata terlebih dahulu sebelum mendaftar asesmen.');
    }

    return view('asesi.asesmen.form', compact('biodata','dokumen','units'));
}

    public function store(Request $request)
    {
        $request->validate([
            'biodata_id'      => 'required|exists:biodata_asesi,id',
            'dokumen_id'      => 'nullable|exists:dokumen_asesi,id',
            'tujuan_asesmen'  => 'required|string',
            'tuk'             => 'nullable|string',
            'jadwal_uji'      => 'nullable|date',
            'metode_uji'      => 'nullable|string',
            'keterangan_teknis' => 'nullable|string',
            'unit_ids'        => 'required|array',
        ]);

        $asesmen = PendaftaranAsesmen::create($request->only([
            'biodata_id',
            'dokumen_id',
            'tujuan_asesmen',
            'tuk',
            'jadwal_uji',
            'metode_uji',
            'keterangan_teknis',
        ]));

        // Simpan unit kompetensi yang dipilih (pivot table)
        $asesmen->units()->sync($request->unit_ids);

        return redirect()->route('asesi.asesmen.index')
            ->with('success', 'Pendaftaran asesmen berhasil ditambahkan.');
    }

    public function show(PendaftaranAsesmen $asesmen)
    {
        $asesmen->load(['biodata','dokumen','units']);
        return view('asesi.asesmen.show', compact('asesmen'));
    }

    public function edit(PendaftaranAsesmen $asesmen)
{
    $asesmen->load('units');
    $biodata = $asesmen->biodata;   // relasi
    $dokumen = $asesmen->dokumen;   // relasi
    $units   = UnitKompetensi::all();

    return view('asesi.asesmen.form', compact('asesmen','biodata','dokumen','units'));
}

    public function update(Request $request, PendaftaranAsesmen $asesmen)
    {
        $request->validate([
            'tujuan_asesmen'  => 'required|string',
            'tuk'             => 'nullable|string',
            'jadwal_uji'      => 'nullable|date',
            'metode_uji'      => 'nullable|string',
            'keterangan_teknis' => 'nullable|string',
            'unit_ids'        => 'required|array',
        ]);

        $asesmen->update($request->only([
            'tujuan_asesmen',
            'tuk',
            'jadwal_uji',
            'metode_uji',
            'keterangan_teknis',
        ]));

        $asesmen->units()->sync($request->unit_ids);

        return redirect()->route('asesi.asesmen.index')
            ->with('success', 'Pendaftaran asesmen berhasil diperbarui.');
    }

    public function destroy(PendaftaranAsesmen $asesmen)
    {
        $asesmen->delete();

        return redirect()->route('asesi.asesmen.index')
            ->with('success', 'Pendaftaran asesmen berhasil dihapus.');
    }
}
