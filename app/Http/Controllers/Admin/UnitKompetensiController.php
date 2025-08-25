<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UnitKompetensi;
use App\Models\Skema;
use Illuminate\Http\Request;

class UnitKompetensiController extends Controller
{
    public function index()
    {
        $units = UnitKompetensi::with('skema')->latest('id')->paginate(15);
        return view('panell.unit.index', compact('units'));
    }

    public function create()
    {
        $skemas = Skema::orderBy('nama')->get();
        return view('panell.unit.create', compact('skemas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'skema_id' => 'required|exists:skemas,id',
            'kode_unit' => 'required|string|max:100',
            'judul_unit' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        UnitKompetensi::create($data);
        return redirect()->route('panell.unit.index')->with('success','Unit kompetensi ditambahkan.');
    }

    public function edit(UnitKompetensi $unit)
    {
        $skemas = Skema::orderBy('nama')->get();
        return view('panell.unit.edit', compact('unit','skemas'));
    }

    public function update(Request $request, UnitKompetensi $unit)
    {
        $data = $request->validate([
            'skema_id' => 'required|exists:skemas,id',
            'kode_unit' => 'required|string|max:100',
            'judul_unit' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $unit->update($data);
        return redirect()->route('panell.unit.index')->with('success','Unit kompetensi diperbarui.');
    }

    public function destroy(UnitKompetensi $unit)
    {
        $unit->delete();
        return back()->with('success','Unit kompetensi dihapus.');
    }
}
