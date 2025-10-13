<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BiodataAsesi;
use App\Models\DokumenAsesi;
use App\Models\User;

class AsesiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Dashboard
     */
    public function index()
    {
        $user = Auth::user();
        $role = $user->active_role ?? $user->role;

        $biodata = BiodataAsesi::where('user_id', $user->id)->first();
        $dokumen = DokumenAsesi::where('user_id', $user->id)->first();

        // arahkan dashboard sesuai role
        if ($role === 'asesor') {
            return view('asesor.dashboard', compact('user', 'biodata', 'dokumen'));
        }

        return view('asesi.dashboard', compact('user', 'biodata', 'dokumen'));
    }

    /**
     * Form biodata & dokumen
     */
    public function biodataForm()
    {
        $user = Auth::user();
        $role = $user->active_role ?? $user->role;

        $biodata = BiodataAsesi::where('user_id', $user->id)->first();
        $dokumen = DokumenAsesi::where('user_id', $user->id)->first();

        $roles = explode(',', $user->role);

        // arahkan view berdasarkan role
        if ($role === 'asesor') {
            return view('asesor.biodata', compact('biodata', 'dokumen', 'roles', 'role'));
        }

        // default: asesi
        return view('asesi.biodata', compact('biodata', 'dokumen', 'roles', 'role'));
    }

    /**
     * Simpan biodata & dokumen (untuk Asesi / Asesor)
     */
public function storeBiodata(Request $request)
{
    $user = Auth::user();
    $role = $user->active_role ?? $user->role;
    $userId = $user->id;

    // === VALIDASI ===
    if ($role === 'asesor') {
        $rules = [
            'no_hp' => 'required|string|max:20',
            'jenis_kelamin' => 'nullable|in:Laki-Laki,Perempuan',
            'kewarganegaraan' => 'nullable|string|max:50',
            'no_identitas' => 'required|string|max:50',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|string|max:255',
            'provinsi' => 'nullable|string|max:100',
            'kabupaten' => 'nullable|string|max:100',
            'foto' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'tanda_tangan' => 'nullable|string',
        ];
    } else {
        $rules = [
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
            'foto' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'ktp_sim_paspor' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:4096',
            'ijazah' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:4096',
            'sertifikat' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:4096',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:4096',
            'tanda_tangan' => 'nullable|string',
        ];
    }

    $request->validate($rules);

    // === SIMPAN BIODATA ===
    $biodataFields = [
        'no_hp', 'jenis_kelamin', 'kewarganegaraan', 'no_identitas',
        'tempat_lahir', 'tanggal_lahir', 'organisasi', 'alamat',
        'provinsi', 'kabupaten', 'pendidikan', 'nama_perguruan_tinggi',
        'program_studi', 'pekerjaan', 'nama_perusahaan', 'alamat_perusahaan',
        'no_telp_perusahaan', 'email_perusahaan', 'jabatan_perusahaan'
    ];

    if ($role === 'asesor') {
        $biodataFields = array_diff($biodataFields, [
            'pendidikan', 'nama_perguruan_tinggi', 'program_studi',
            'pekerjaan', 'nama_perusahaan', 'alamat_perusahaan',
            'no_telp_perusahaan', 'email_perusahaan', 'jabatan_perusahaan'
        ]);
    }

    $biodataData = $request->only($biodataFields);
    BiodataAsesi::updateOrCreate(['user_id' => $userId], $biodataData + ['user_id' => $userId]);

    // === SIMPAN DOKUMEN ===
    $dokumen = DokumenAsesi::firstOrNew(['user_id' => $userId]);

    // Simpan file upload biasa
    foreach ($request->allFiles() as $field => $file) {
        $path = $file->store('dokumen/' . $field, 'public');
        $dokumen->$field = $path;
    }

    // Simpan tanda tangan baru kalau ada
    $data = $request->input('tanda_tangan');

    if (!empty($data) && preg_match('/^data:image\/(\w+);base64,/', $data, $type)) {
        $data = substr($data, strpos($data, ',') + 1);
        $type = strtolower($type[1]);
        $data = base64_decode($data);

        $fileName = 'ttd_' . $userId . '_' . time() . '.' . $type;
        $filePath = 'dokumen/ttd/' . $fileName;

        \Storage::disk('public')->put($filePath, $data);
        $dokumen->tanda_tangan = $filePath;
    } elseif (!$dokumen->exists) {
        // Jika baru pertama kali dan tidak ada tanda tangan, biarkan kosong
        $dokumen->tanda_tangan = null;
    }
    // kalau update tapi tidak gambar baru, tanda tangan lama tetap aman

    $dokumen->save();

    return redirect()->back()->with('success', 'Biodata & dokumen berhasil disimpan!');
}



    /**
     * Ganti active_role antar asesi ↔ asesor
     */
    public function switchRole($role)
    {
        $user = Auth::user();
        $roles = explode(',', $user->role);

        if (in_array($role, $roles)) {
            $user->active_role = $role;
            $user->save();

            if ($role === 'asesor') {
                return redirect()->route('asesor.dashboard');
            }
            return redirect()->route('asesi.dashboard');
        }

        return redirect()->back()->with('error', 'Role tidak valid.');
    }
}
