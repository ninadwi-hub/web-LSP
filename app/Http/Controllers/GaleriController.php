<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::latest()->get();
        return view('panel.galeri.index', compact('galeris'));
    }

    public function create()
{
    return view('panel.galeri.create');
}

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'image_path' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:draft,published,archived'
        ]);

        $imagePath = $request->file('image_path')->store('galeri', 'public');

        Galeri::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'image_path' => $imagePath,
            'category_id' => $request->category_id,
            'album_id' => $request->album_id,
            'uploader' => $request->uploader ?? 'admin',
            'status' => $request->status,
            'taken_at' => $request->taken_at,
            'is_featured' => $request->is_featured ? 1 : 0,
        ]);

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil ditambahkan.');
    }
public function edit($id)
{
    $galeri = Galeri::findOrFail($id); // cari berdasarkan ID

    return view('panel.galeri.edit', compact('galeri')); // PENTING: variabel dikirim ke view
}

    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'title' => 'required|max:255',
            'status' => 'required|in:draft,published,archived'
        ]);

        $data = $request->only([
            'title', 'description', 'status', 'category_id',
            'album_id', 'taken_at', 'uploader'
        ]);
        $data['slug'] = Str::slug($request->title);
        $data['is_featured'] = $request->is_featured ? 1 : 0;

        if ($request->hasFile('image_path')) {
            if ($galeri->image_path) {
                Storage::disk('public')->delete($galeri->image_path);
            }
            $data['image_path'] = $request->file('image_path')->store('galeri', 'public');
        }

        $galeri->update($data);
        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy(Galeri $galeri)
    {
        if ($galeri->image_path) {
            Storage::disk('public')->delete($galeri->image_path);
        }
        $galeri->delete();
        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil dihapus.');
    }

    // ✅ Halaman publik
    public function showGallery()
    {
        $galeris = Galeri::where('status', 'published')->latest()->get();
        return view('galeripublik.index', compact('galeris'));
    }
}
