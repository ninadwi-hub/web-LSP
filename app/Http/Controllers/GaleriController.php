<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    // Admin: Tampilkan semua galeri
    public function index()
    {
        $galeris = Galeri::latest()->get();
        return view('panel.galeri.index', compact('galeris'));
    }

    // Admin: Form tambah
    public function create()
    {
        return view('panel.galeri.create');
    }

    // Admin: Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image_path' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:draft,published,archived',
        ]);

        $data = $request->only(['title', 'slug', 'description', 'status']);
        $data['image_path'] = $request->file('image_path')->store('galleries', 'public');

        Galeri::create($data);

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil ditambahkan.');
    }

    // Admin: Form edit
    public function edit(Galeri $galeri)
    {
        return view('panel.galeri.edit', compact('galeri'));
    }

    // Admin: Update data
    public function update(Request $request, Galeri $galeri)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:draft,published,archived',
        ]);

        if ($request->hasFile('image_path')) {
            if ($galeri->image_path) {
                Storage::disk('public')->delete($galeri->image_path);
            }
            $data['image_path'] = $request->file('image_path')->store('galleries', 'public');
        }

        $galeri->update($data);

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil diperbarui.');
    }

    // Admin: Hapus data
    public function destroy(Galeri $galeri)
    {
        if ($galeri->image_path) {
            Storage::disk('public')->delete($galeri->image_path);
        }

        $galeri->delete();

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil dihapus.');
    }

    // Publik: Tampilkan galeri yang sudah dipublish
    public function publicIndex()
    {
        $galeris = Galeri::where('status', 'published')->latest()->get();
        return view('galeri.publik', compact('galeris'));
    }
}

