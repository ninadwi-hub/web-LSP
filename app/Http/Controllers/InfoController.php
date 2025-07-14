<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class InfoController extends Controller
{
    public function index()
    {
        $infos = Info::with('kategori')->latest()->get();
        return view('infos.index', compact('infos'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('infos.create', compact('kategoris'));
    }

  public function store(Request $request)
{
    $request->validate([
        'category_id' => 'required|exists:kategoris,id',
        'title' => 'required|string|max:255',
        'content' => 'nullable|string',
        'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $data = $request->only('category_id', 'title', 'content');
    $data['slug'] = \Str::slug($data['title']);

    if ($request->hasFile('thumbnail')) {
        $data['thumbnail'] = $request->file('thumbnail')->store('gambar_info', 'public');
    }

    Info::create($data);

    return redirect()->route('infos.index')->with('success', 'Info berhasil ditambahkan.');
}


    public function edit(Info $info)
    {
        $kategoris = Kategori::all();
        return view('infos.edit', compact('info', 'kategoris'));
    }

    public function update(Request $request, Info $info)
{
    $request->validate([
        'category_id' => 'required|exists:kategoris,id',
        'title' => 'required|string|max:255',
        'content' => 'nullable|string',
        'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $data = $request->only('category_id', 'title', 'content');

    // Tambahkan slug
    $data['slug'] = \Str::slug($data['title']);

    if ($request->hasFile('thumbnail')) {
        if ($info->thumbnail) {
            Storage::disk('public')->delete($info->thumbnail);
        }
        $data['thumbnail'] = $request->file('thumbnail')->store('gambar_info', 'public');
    }

    $info->update($data);

    return redirect()->route('infos.index')->with('success', 'Info berhasil diperbarui.');
}

    public function destroy(Info $info)
    {
        if ($info->thumbnail) {
            Storage::disk('public')->delete($info->thumbnail);
        }

        $info->delete();

        return redirect()->route('infos.index')->with('success', 'Info berhasil dihapus.');
    }
}
