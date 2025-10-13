<?php

namespace App\Http\Controllers;

use App\Models\Tuk;
use Illuminate\Http\Request;

class TukController extends Controller
{
    /**
     * Menampilkan daftar semua TUK.
     */
    public function index()
    {
       $tuks = Tuk::paginate(10);
        return view('tuk.index', compact('tuks'));
    }

    /**
     * Menyimpan data TUK baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:tuks,kode',
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'provinsi' => 'nullable|string|max:100',
            'kabupaten' => 'nullable|string|max:100',
        ]);

        Tuk::create($validated);

        return redirect()->route('tuk.index')->with('success', 'Data TUK berhasil ditambahkan.');
    }

    /**
     * Menghapus data TUK.
     */
    public function destroy(Tuk $tuk)
    {
        $tuk->delete();
        return redirect()->route('tuk.index')->with('success', 'Data TUK berhasil dihapus.');
    }
}
