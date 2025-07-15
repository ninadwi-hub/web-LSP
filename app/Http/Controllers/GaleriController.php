<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GaleriController extends Controller
{
    public function index() {
        $galeris = Galeri::latest()->get();
        return view('panel.galeri.index', compact('galeris'));
    }

    public function create() {
        return view('panel.galeri.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
          'slug' => 'required|string|max:255|unique:galleries',
            'description' => 'nullable|string',
            'image_path' => 'required|string|max:255',
            'category_id' => 'nullable|exists:gallery_categories,id',
            'album_id' => 'nullable|exists:albums,id',
            'uploader' => 'nullable|string|max:100',
            'status' => 'required|in:draft,published,archived',
            'taken_at' => 'nullable|date',
            'is_featured' => 'nullable|boolean',
        ]);

        Galeri::create($validated);
        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function edit(Galeri $galeri) {
        return view('panel.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, Galeri $galeri) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
           'slug' => 'required|string|max:255|unique:galleries,slug,' . $galeri->id,
            'description' => 'nullable|string',
            'image_path' => 'required|string|max:255',
            'category_id' => 'nullable|exists:gallery_categories,id',
            'album_id' => 'nullable|exists:albums,id',
            'uploader' => 'nullable|string|max:100',
            'status' => 'required|in:draft,published,archived',
            'taken_at' => 'nullable|date',
            'is_featured' => 'nullable|boolean',
        ]);

        $galeri->update($validated);
        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy(Galeri $galeri) {
        $galeri->delete();
        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil dihapus.');
    }
}
