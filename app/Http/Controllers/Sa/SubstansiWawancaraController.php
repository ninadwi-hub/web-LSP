<?php

namespace App\Http\Controllers\Sa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubstansiWawancara;
use App\Models\Skema;
use App\Models\UnitKompetensi;

class SubstansiWawancaraController extends Controller
{
    // Halaman daftar skema
    public function index()
    {
        $skemas = Skema::all();
        return view('sa.substansi_wawancara.index', compact('skemas'));
    }

    // Detail per skema
    public function show($id)
    {
        $skema = Skema::findOrFail($id);
        $substansis = SubstansiWawancara::where('skema_id', $id)->get();
        $unitKompetensis = UnitKompetensi::all();

        return view('sa.substansi_wawancara.detail', compact('skema', 'substansis', 'unitKompetensis'));
    }

    // Simpan
    public function store(Request $request)
    {
        $request->validate([
            'skema_id' => 'required',
            'unit_kompetensi_id' => 'required',
            'nomor_elemen' => 'required',
            'substansi' => 'required',
        ]);

        SubstansiWawancara::create($request->all());
        return back()->with('success', 'Substansi wawancara berhasil ditambahkan!');
    }

    // Hapus
    public function destroy($id)
    {
        SubstansiWawancara::findOrFail($id)->delete();
        return back()->with('success', 'Substansi wawancara berhasil dihapus.');
    }
}
