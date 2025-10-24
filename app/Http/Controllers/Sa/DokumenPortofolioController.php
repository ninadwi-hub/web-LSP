<?php

namespace App\Http\Controllers\Sa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DokumenPortofolio;
use App\Models\Skema;
use App\Models\UnitKompetensi;

class DokumenPortofolioController extends Controller
{
    // Halaman daftar skema
    public function index()
    {
        $skemas = Skema::all();
        return view('sa.dokumen_portofolio.index', compact('skemas'));
    }

    // Halaman detail dokumen per skema
    public function show($id)
    {
        $skema = Skema::findOrFail($id);
        $dokumens = DokumenPortofolio::where('skema_id', $id)->with('unitKompetensi')->get();
        $unitKompetensis = UnitKompetensi::all();

        return view('sa.dokumen_portofolio.detail', compact('skema', 'dokumens', 'unitKompetensis'));
    }

    // Simpan dokumen baru
    public function store(Request $request)
    {
        $request->validate([
            'skema_id' => 'required',
            'unit_kompetensi_id' => 'required',
            'dokumen_portofolio' => 'required',
        ]);

        DokumenPortofolio::create($request->all());

        return back()->with('success', 'Dokumen portofolio berhasil ditambahkan!');
    }
}
