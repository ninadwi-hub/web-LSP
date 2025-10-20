<?php

namespace App\Http\Controllers;

use App\Models\AsesorKompetensi;
use Illuminate\Http\Request;

class AsesorKompetensiController extends Controller
{
    /**
     * Tampilkan daftar asesor.
     */
    public function index()
    {
        $asesors = AsesorKompetensi::orderBy('nama', 'asc')->paginate(10);
        return view('sa.asesor_kompetensi.index', compact('asesors'));
    }

    /**
     * Simpan data asesor baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_registrasi' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'email' => 'nullable|email',
            'hp' => 'nullable|string|max:20',
            'tgl_expired' => 'nullable|date',
            'username' => 'nullable|string|max:255',
        ]);

        AsesorKompetensi::create($request->all());

        return redirect()->route('sa.asesor_kompetensi.index')->with('success', 'Data asesor berhasil ditambahkan!');
    }

    /**
     * Update data asesor.
     */
    public function update(Request $request, $id)
    {
        $asesor = AsesorKompetensi::findOrFail($id);

        $request->validate([
            'no_registrasi' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'email' => 'nullable|email',
            'hp' => 'nullable|string|max:20',
            'tgl_expired' => 'nullable|date',
            'username' => 'nullable|string|max:255',
        ]);

        $asesor->update($request->all());

        return redirect()->route('sa.asesor_kompetensi.index')->with('success', 'Data asesor berhasil diperbarui!');
    }

    /**
     * Hapus data asesor.
     */
    public function destroy($id)
    {
        $asesor = AsesorKompetensi::findOrFail($id);
        $asesor->delete();

        return redirect()->route('sa.asesor_kompetensi.index')->with('success', 'Data asesor berhasil dihapus!');
    }
}
