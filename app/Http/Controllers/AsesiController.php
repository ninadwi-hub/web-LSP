<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BiodataAsesi;
use App\Models\DokumenAsesi;

class AsesiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Dashboard asesi
    public function index()
    {
        $user = Auth::user()->load(['asesi','dokumen']);
        return view('asesi.dashboard', compact('user'));
    }

    // Form biodata create/edit
    // Form biodata create/edit
public function biodataForm()
{
    $userId = Auth::id();

    // Ambil data biodata user jika sudah ada
    $biodata = BiodataAsesi::where('user_id', $userId)->first();

    // Ambil nama lengkap dari tabel users
    $userName = Auth::user()->name;

    // Kirim ke view
    return view('asesi.biodata', compact('biodata', 'userName'));
}

    // Simpan/update biodata
   public function storeBiodata(Request $request)
{
    $rules = [
        'no_hp' => 'required|string|max:20',
        'jenis_kelamin' => 'nullable|string|max:20',
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

    $request->validate($rules);

    $data = $request->only(array_keys($rules));

    BiodataAsesi::updateOrCreate(
        ['user_id' => auth()->id()],
        $data + ['user_id' => auth()->id()]
    );

    return redirect()->back()->with('success','Biodata berhasil disimpan!');
}

    // Form upload dokumen
    public function createDokumen()
    {
        return view('asesi.create-dokumen');
    }

    // Simpan dokumen
    public function storeDokumen(Request $request)
    {
        $userId = Auth::id();
        $dokumen = DokumenAsesi::firstOrNew(['user_id' => $userId]);

        if($request->hasFile('foto')) $dokumen->foto = $request->file('foto')->store('dokumen/foto');
        if($request->hasFile('ktp_sim_paspor')) $dokumen->ktp_sim_paspor = $request->file('ktp_sim_paspor')->store('dokumen/identitas');
        if($request->hasFile('ijazah')) $dokumen->ijazah = $request->file('ijazah')->store('dokumen/ijazah');
        if($request->hasFile('sertifikat')) $dokumen->sertifikat = $request->file('sertifikat')->store('dokumen/sertifikat');
        if($request->hasFile('cv')) $dokumen->cv = $request->file('cv')->store('dokumen/cv');
        if($request->hasFile('tanda_tangan')) $dokumen->tanda_tangan = $request->file('tanda_tangan')->store('dokumen/ttd');

        $dokumen->user_id = $userId;
        $dokumen->save();

        return redirect()->route('asesi.index')->with('success','Dokumen berhasil diupload');
    }
}
