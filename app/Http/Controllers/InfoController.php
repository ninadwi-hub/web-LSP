<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class InfoController extends Controller
{
    public function index()
{
    $info = Info::latest()->paginate(10); // ✅ ubah get() jadi paginate()
    return view('info.index', compact('info'));
}

    public function create()
    {
        $kategoris = Kategori::all();
        return view('info.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:200',
            'kategori_id' => 'required|exists:kategoris,id',
            'content' => 'required',
            'thumbnail' => 'image|nullable'
        ]);

        $slug = Str::slug($request->title);
        $thumbnail = $request->file('thumbnail')?->store('thumbnails');

        Info::create([
            'title' => $request->title,
            'slug' => $slug,
            'kategori_id' => $request->kategori_id,
            'content' => $request->content,
            'thumbnail' => $thumbnail
        ]);

        return redirect()->route('infos.index')->with('success', 'Info berhasil ditambahkan');
    }

    public function edit(Info $info)
    {
        $kategoris = Kategori::all();
        return view('.info.edit', compact('info', 'kategoris'));
    }

    public function update(Request $request, Info $info)
    {
        $request->validate([
            'title' => 'required|max:200',
            'kategori_id' => 'required|exists:kategoris,id',
            'content' => 'required',
            'thumbnail' => 'image|nullable'
        ]);

        $slug = Str::slug($request->title);
        $thumbnail = $info->thumbnail;

        if ($request->hasFile('thumbnail')) {
            if ($info->thumbnail) Storage::delete($info->thumbnail);
            $thumbnail = $request->file('thumbnail')->store('thumbnails');
        }

        $info->update([
            'title' => $request->title,
            'slug' => $slug,
            'kategori_id' => $request->kategori_id,
            'content' => $request->content,
            'thumbnail' => $thumbnail
        ]);

        return redirect()->route('infos.index')->with('success', 'Info berhasil diperbarui');
    }

    public function destroy(Info $info)
    {
        if ($info->thumbnail) Storage::delete($info->thumbnail);
        $info->delete();
        return back()->with('success', 'Info berhasil dihapus');
    }
}
