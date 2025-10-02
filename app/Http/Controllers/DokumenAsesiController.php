<?php

namespace App\Http\Controllers;

use App\Models\DokumenAsesi;
use Illuminate\Http\Request;

class DokumenAsesiController extends Controller
{
    /**
     * Aturan validasi dokumen
     */
    private $rules = [
        'foto' => 'nullable|file|mimes:jpg,jpeg,png',
        'ktp_sim_paspor' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
        'ijazah' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
        'sertifikat' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
        'cv' => 'nullable|file|mimes:pdf,doc,docx',
        'tanda_tangan' => 'nullable|file|mimes:jpg,jpeg,png',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokumen = DokumenAsesi::where('user_id', auth()->id())->first();
        return view('asesi.dokumen', compact('dokumen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->rules);

        $data = [];

        foreach(array_keys($this->rules) as $fileField){
            if($request->hasFile($fileField)){
                $data[$fileField] = $request->file($fileField)->store('dokumen', 'public');
            }
        }

        DokumenAsesi::updateOrCreate(
            ['user_id' => auth()->id()],
            $data + ['user_id' => auth()->id()]
        );

        return redirect()->back()->with('success', 'Dokumen berhasil disimpan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DokumenAsesi $dokumenAsesi)
    {
        return view('asesi.dokumen-edit', compact('dokumenAsesi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DokumenAsesi $dokumenAsesi)
    {
        $request->validate($this->rules);

        $data = [];

        foreach(array_keys($this->rules) as $fileField){
            if($request->hasFile($fileField)){
                $data[$fileField] = $request->file($fileField)->store('dokumen', 'public');
            }
        }

        $dokumenAsesi->update($data);

        return redirect()->back()->with('success', 'Dokumen berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DokumenAsesi $dokumenAsesi)
    {
        // Hapus file fisik jika ada
        foreach(array_keys($this->rules) as $fileField){
            if($dokumenAsesi->$fileField && \Storage::disk('public')->exists($dokumenAsesi->$fileField)){
                \Storage::disk('public')->delete($dokumenAsesi->$fileField);
            }
        }

        $dokumenAsesi->delete();

        return redirect()->back()->with('success', 'Dokumen berhasil dihapus.');
    }
}
