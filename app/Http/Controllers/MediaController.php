<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    // Admin: Tampilkan semua file
    public function index()
    {
        $media = Media::latest()->get();
        return view('paneladmin.media.index', compact('media'));
    }

    // Admin: Tampilkan form tambah
    public function create()
    {
        return view('paneladmin.media.create');
    }

    // Admin: Simpan file baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'file_path' => 'required|file|max:10240', // 10 MB
            'file_type' => 'nullable|string|max:50',
            'status' => 'required|in:draft,published,archived',
        ]);

        $file = $request->file('file_path');
        $path = $file->store('media', 'public');

        Media::create([
            'title' => $request->title,
            'slug' => $request->slug ?? \Str::slug($request->title),
            'description' => $request->description,
            'file_path' => $path,
            'file_type' => $file->getClientOriginalExtension(),
            'file_size' => $file->getSize(),
            'uploader' => auth()->user()->name ?? 'Admin',
            'status' => $request->status,
            'download_count' => 0,
        ]);

        return redirect()->route('media.index')->with('success', 'File berhasil ditambahkan.');
    }

    // Admin: Tampilkan form edit
    public function edit(Media $media)
{
    return view('paneladmin.media.edit', compact('media'));
}


    // Admin: Update file
   public function update(Request $request, Media $media)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'slug' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'file_path' => 'nullable|file|max:10240',
        'status' => 'required|in:draft,published,archived',
    ]);

    $data['slug'] = $request->slug ?? \Str::slug($request->title);

    // Jika file baru diunggah
    if ($request->hasFile('file_path')) {
        // Hapus file lama
        if ($media->file_path && Storage::disk('public')->exists($media->file_path)) {
            Storage::disk('public')->delete($media->file_path);
        }

        $file = $request->file('file_path');
        $data['file_path'] = $file->store('media', 'public');
        $data['file_type'] = $file->getClientOriginalExtension();
        $data['file_size'] = $file->getSize();
    }

    $media->update($data);

    return redirect()->route('media.index')->with('success', 'File berhasil diperbarui.');
}

    // Admin: Hapus file
    public function destroy(Media $media)
    {
        if ($media->file_path) {
            Storage::disk('public')->delete($media->file_path);
        }

        $media->delete();

        return redirect()->route('media.index')->with('success', 'File berhasil dihapus.');
    }

    // Publik: Tampilkan file published
    public function publicIndex()
    {
        $media = Media::where('status', 'published')->latest()->get();
        return view('media.publik', compact('media'));
    }
}
