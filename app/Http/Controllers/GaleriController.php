<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::latest()->paginate(10);
        return view('panel.galeri.index', compact('galeris'));
    }

    public function create()
    {
        return view('panel.galeri.create');
    }

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image_path' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        'category_id' => 'nullable|integer',
        'album_id' => 'nullable|integer',
        'status' => 'required|in:draft,published,archived',
        'taken_at' => 'nullable|date',
        'is_featured' => 'nullable|boolean',
    ]);

    // Simpan gambar
    $imagePath = $request->file('image_path')->store('galeri', 'public');

    // Simpan ke database
    Galeri::create([
        'title' => $request->title,
        'slug' => Str::slug($request->title),
        'description' => $request->description,
        'image_path' => $imagePath,
        'category_id' => $request->category_id ?: null,
        'album_id' => $request->album_id,
        'uploader' => auth()->id() ?? null,
        'status' => $request->status,
        'taken_at' => $request->taken_at,
        'is_featured' => $request->has('is_featured'),
    ]);

    return redirect()->route('galeri.index')->with('success', 'Galeri berhasil ditambahkan!');
}

    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('panel.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, Galeri $galeri)
{
    $request->validate([
        'title' => 'required|max:255',
        'status' => 'required|in:draft,published,archived',
    ]);

    $data = $request->only([
        'title', 'description', 'status', 'category_id',
        'album_id', 'taken_at', 'uploader'
    ]);

    $data['slug'] = Str::slug($request->title);
    $data['is_featured'] = $request->has('is_featured') ? 1 : 0;

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

    // Halaman publik / detail
    public function show($id)
    {
        $galeri = Galeri::with('category', 'album')->findOrFail($id);
        return view('panel.galeri.show', compact('galeri'));
    }
}
