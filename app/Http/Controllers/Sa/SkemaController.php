<?php

namespace App\Http\Controllers\Sa;

use App\Http\Controllers\Controller;
use App\Models\Skema;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;

class SkemaController extends Controller
{
    // Tampilkan daftar skema dengan pagination
    public function index()
{
    // ambil data langsung dengan paginate
    $skemas = Skema::orderBy('created_at', 'desc')->paginate(10);

    // update status tiap item tanpa memengaruhi paginasi
    foreach ($skemas as $skema) {
        $mulai = $skema->tanggal_mulai ? Carbon::parse($skema->tanggal_mulai) : null;
        $selesai = $skema->tanggal_selesai ? Carbon::parse($skema->tanggal_selesai) : null;

        $skema->status = ($mulai && $selesai && Carbon::now()->between($mulai, $selesai))
            ? 'aktif'
            : 'nonaktif';

        $skema->saveQuietly();
    }

    return view('sa.skema.index', compact('skemas'));
}



    // Form tambah skema baru
    public function create()
    {
        return view('sa.skema.create');
    }

    // Simpan skema baru
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:50|unique:skemas,kode',
            'nama' => 'required|string|max:255',
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'kuota' => 'nullable|integer|min:1',
            'level' => 'nullable|integer|min:1',
            'jenis' => 'nullable|string|max:50',
        ]);

        $tanggalMulai = $request->tanggal_mulai ? Carbon::parse($request->tanggal_mulai) : null;
        $tanggalSelesai = $request->tanggal_selesai ? Carbon::parse($request->tanggal_selesai) : null;

        $status = ($tanggalMulai && $tanggalSelesai && Carbon::now()->between($tanggalMulai, $tanggalSelesai))
            ? 'aktif'
            : 'nonaktif';

        Skema::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'kuota' => $request->kuota,
            'level' => $request->level ? "Level {$request->level}" : null, // otomatis nambah kata "Level"
            'jenis' => $request->jenis ?? null,
            'status' => $status,
        ]);

        return redirect()->route('sa.skema.index')->with('success', 'Skema berhasil ditambahkan.');
    }

    // Form edit skema
    public function edit($id)
    {
        $skema = Skema::findOrFail($id);
        return view('sa.skema.edit', compact('skema'));
    }

    // Update skema
    public function update(Request $request, $id)
    {
        $skema = Skema::findOrFail($id);

        $request->validate([
            'kode' => 'required|string|max:50|unique:skemas,kode,' . $skema->id,
            'nama' => 'required|string|max:255',
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'kuota' => 'nullable|integer|min:1',
            'level' => 'nullable|integer|min:1',
            'jenis' => 'nullable|string|max:50',
        ]);

        $tanggalMulai = $request->tanggal_mulai ? Carbon::parse($request->tanggal_mulai) : null;
        $tanggalSelesai = $request->tanggal_selesai ? Carbon::parse($request->tanggal_selesai) : null;

        $status = ($tanggalMulai && $tanggalSelesai && Carbon::now()->between($tanggalMulai, $tanggalSelesai))
            ? 'aktif'
            : 'nonaktif';

        $skema->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'kuota' => $request->kuota,
            'level' => $request->level ? "Level {$request->level}" : null,
            'jenis' => $request->jenis ?? $skema->jenis,
            'status' => $status,
        ]);

        return redirect()->route('sa.skema.index')->with('success', 'Skema berhasil diperbarui.');
    }

    // Hapus skema
    public function destroy($id)
    {
        $skema = Skema::findOrFail($id);
        $skema->delete();

        return redirect()->route('sa.skema.index')->with('success', 'Skema berhasil dihapus.');
    }
}
