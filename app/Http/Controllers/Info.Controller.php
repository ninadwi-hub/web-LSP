<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InfoController extends Controller
{
    public function index()
    {
        $info = Info::latest()->get();
        return view('panel.info.index', compact('info'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('panel.info.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'kategori_id' => 'required',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        Info::create($data);

        return redirect()->route('info.index')->with('success', 'Info berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $info = Info::findOrFail($id);
        $kategoris = Kategori::all();
        return view('panel.info.edit', compact('info', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $info = Info::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'kategori_id' => 'required',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('thumbnail')) {
            if ($info->thumbnail) {
                \Storage::disk('public')->delete($info->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $info->update($data);

        return redirect()->route('info.index')->with('success', 'Info berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $info = Info::findOrFail($id);
        if ($info->thumbnail) {
            \Storage::disk('public')->delete($info->thumbnail);
        }
        $info->delete();

        return redirect()->route('info.index')->with('success', 'Info berhasil dihapus.');
    }
}
