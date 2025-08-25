<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Info;
use App\Models\Kategori;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class InfoController extends Controller
{
    public function index()
    {
        $info = Info::with('kategori')->latest()->paginate(10);
        return view('info.index', compact('info'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        $pages = Page::all();
        return view('info.create', compact('kategoris', 'pages'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'page_id'     => 'nullable|exists:pages,id',
            'title'       => 'required|string|max:255',
            'content'     => 'nullable|string',
            'status'      => 'required|in:draft,published,archived',
            'thumbnail'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_public'   => 'nullable|boolean'
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $validated['is_public'] = $request->has('is_public') ? 1 : 0;

        $validated['slug'] = Str::slug($validated['title']);

        Info::create([
            'kategori_id' => $validated['kategori_id'],
            'page_id'     => $validated['page_id'] ?? null,
            'judul'       => $validated['title'],
            'deskripsi'   => $validated['content'] ?? null,
            'status'      => $validated['status'],
            'thumbnail'   => $validated['thumbnail'] ?? null,
            'is_public'   => $validated['is_public'],
            'slug'        => $validated['slug'],
        ]);

        return redirect()->route('admin.info.index')->with('success', 'Info berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $info = Info::findOrFail($id);
        $kategoris = Kategori::all();
        $pages = Page::all();
        return view('info.edit', compact('info', 'kategoris', 'pages'));
    }

    public function update(Request $request, $id)
    {
        $info = Info::findOrFail($id);

        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'page_id'     => 'nullable|exists:pages,id',
            'title'       => 'required|string|max:255',
            'content'     => 'nullable|string',
            'status'      => 'required|in:draft,published,archived',
            'thumbnail'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_public'   => 'nullable|boolean'
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($info->thumbnail && Storage::disk('public')->exists($info->thumbnail)) {
                Storage::disk('public')->delete($info->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        } else {
            $validated['thumbnail'] = $info->thumbnail; // keep old if no new upload
        }

        $validated['is_public'] = $request->has('is_public') ? 1 : 0;
        $validated['slug'] = Str::slug($validated['title']);

        $info->update([
            'kategori_id' => $validated['kategori_id'],
            'page_id'     => $validated['page_id'] ?? null,
            'judul'       => $validated['title'],
            'deskripsi'   => $validated['content'] ?? null,
            'status'      => $validated['status'],
            'thumbnail'   => $validated['thumbnail'],
            'is_public'   => $validated['is_public'],
            'slug'        => $validated['slug'],
        ]);

        return redirect()->route('admin.info.index')->with('success', 'Info berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $info = Info::findOrFail($id);

        if ($info->thumbnail && Storage::disk('public')->exists($info->thumbnail)) {
            Storage::disk('public')->delete($info->thumbnail);
        }

        $info->delete();

        return redirect()->route('admin.info.index')->with('success', 'Info berhasil dihapus.');
    }
}
