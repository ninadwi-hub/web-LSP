<?php

namespace App\Http\Controllers\Sa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skema;
use App\Models\PertanyaanWawancara;
use App\Models\UnitKompetensi;

class PertanyaanWawancaraController extends Controller
{
    // Halaman daftar semua pertanyaan
    public function index()
    {
        $skemas = \App\Models\Skema::all();
        return view('sa.pertanyaan_wawancara.index', compact('skemas'));
    }


    // Halaman detail pertanyaan per skema
    public function show($id)
    {
        $skema = Skema::findOrFail($id);
        $pertanyaans = PertanyaanWawancara::with('unitKompetensi')
            ->where('skema_id', $id)
            ->get();
        $unitKompetensis = UnitKompetensi::all();

        return view('sa.pertanyaan_wawancara.detail', compact('skema', 'pertanyaans', 'unitKompetensis'));
    }

    // Simpan pertanyaan baru
    public function store(Request $request)
    {
        $request->validate([
            'skema_id' => 'required|exists:skemas,id',
            'unit_kompetensi_id' => 'required|exists:unit_kompetensis,id',
            'pertanyaan' => 'required|string|max:255',
        ]);

        PertanyaanWawancara::create([
            'skema_id' => $request->skema_id,
            'unit_kompetensi_id' => $request->unit_kompetensi_id,
            'pertanyaan' => $request->pertanyaan,
        ]);

        return back()->with('success', 'Pertanyaan berhasil ditambahkan!');
    }

    // Hapus pertanyaan
    public function destroy($id)
    {
        PertanyaanWawancara::findOrFail($id)->delete();
        return back()->with('success', 'Pertanyaan berhasil dihapus.');
    }
}
