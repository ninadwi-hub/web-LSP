<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str; 


class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::orderBy('created_at', 'desc')->paginate(10);
        return view('kategoris.index', compact('kategoris'));
    }

    public function create()
    {
        return view('kategoris.create');
    }

public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:100',
        'deskripsi' => 'nullable|string',
    ]);


Kategori::create([
    'nama' => $request->nama,
    'slug' => Str::slug($request->nama),
    'deskripsi' => $request->deskripsi,
]);


    return redirect()->route('kategoris.index')->with('success', 'Kategori berhasil ditambahkan.');
}
    public function edit(Kategori $kategori)
    {
        return view('kategoris.edit', compact('kategori'));
    }

   public function update(Request $request, Kategori $kategori)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
    ]);

    $kategori->update([
        'nama' => $request->nama,
        'slug' => Str::slug($request->nama), // 🔁 Update slug juga
        'deskripsi' => $request->deskripsi,
    ]);

    return redirect()->route('kategoris.index')->with('success', 'Kategori berhasil diperbarui.');
}

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategoris.index')->with('success', 'Kategori berhasil dihapus.');
    }
    public function show($slug)
{
    $kategori = Kategori::where('slug', $slug)->firstOrFail();
    $infos = $kategori->infos()->latest()->get();

    return view('page.show', compact('kategori', 'infos','page'));
}

}
