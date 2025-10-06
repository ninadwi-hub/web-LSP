<?php

namespace App\Http\Controllers;

use App\Models\BiodataAsesi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AsesiController extends Controller
{
    /**
     * Aturan validasi biodata
     */
    private $rules = [
        'no_hp' => 'required|string|max:20',
        'jenis_kelamin' => 'nullable|in:Laki-Laki,Perempuan',
        'kewarganegaraan' => 'nullable|string|max:50',
        'no_identitas' => 'required|string|max:50',
        'tempat_lahir' => 'nullable|string|max:255',
        'tanggal_lahir' => 'nullable|date',
        'organisasi' => 'nullable|string|max:150',
        'alamat' => 'nullable|string',
        'provinsi' => 'nullable|string|max:100',
        'kabupaten' => 'nullable|string|max:100',
        'pendidikan' => 'nullable|string|max:255',
        'nama_perguruan_tinggi' => 'nullable|string|max:255',
        'program_studi' => 'nullable|string|max:255',
        'pekerjaan' => 'nullable|string|max:255',
        'nama_perusahaan' => 'nullable|string|max:255',
        'alamat_perusahaan' => 'nullable|string',
        'no_telp_perusahaan' => 'nullable|string|max:20',
        'email_perusahaan' => 'nullable|email',
        'jabatan_perusahaan' => 'nullable|string|max:255',
    ];

    /**
     * Dashboard Asesi
     */
    public function index()
    {
        return view('asesi.dashboard');
    }

    /**
     * Form Biodata
     */
    public function biodataForm()
    {
        $biodata = BiodataAsesi::where('user_id', Auth::id())->first();
        return view('asesi.biodata', compact('biodata'));
    }

    /**
     * Simpan Biodata baru
     */
    public function store(Request $request)
    {
        $request->validate($this->rules);

        $data = $request->only(array_keys($this->rules));

        BiodataAsesi::updateOrCreate(
            ['user_id' => auth()->id()],
            $data + ['user_id' => auth()->id()]
        );

        return redirect()->back()->with('success', 'Biodata berhasil disimpan.');
    }

    /**
     * Tampilkan detail biodata
     */
    public function show($id)
    {
        $biodata = BiodataAsesi::findOrFail($id);
        return view('asesi.biodata-show', compact('biodata'));
    }

    /**
     * Form edit biodata
     */
    public function edit($id)
    {
        $biodata = BiodataAsesi::findOrFail($id);
        return view('asesi.biodata-edit', compact('biodata'));
    }

    /**
     * Update biodata
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->rules);

        $biodata = BiodataAsesi::findOrFail($id);
        $biodata->update($request->only(array_keys($this->rules)));

        return redirect()->route('asesi.biodata')->with('success', 'Biodata berhasil diperbarui.');
    }

    /**
     * Hapus biodata
     */
    public function destroy($id)
    {
        $biodata = BiodataAsesi::findOrFail($id);
        $biodata->delete();

        return redirect()->route('asesi.biodata')->with('success', 'Biodata berhasil dihapus.');
    }
}
