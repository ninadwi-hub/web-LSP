<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function index()
{
    $pages = Page::paginate(10); // langsung paginate
    return view('admin.pages.index', compact('pages'));
}


    public function create()
    {
        return view('admin.pages.create');
    }

public function store(Request $request)
{
    $kategoriValid = \App\Models\Menu::where('is_active', 1)->pluck('slug')->toArray();

$validated = $request->validate([
    'title' => 'required|string|max:255',
    'content' => 'required',
    'status' => 'required|in:draft,published',
    'category' => 'required|in:' . implode(',', $kategoriValid),
    'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    'meta_description' => 'nullable|string',
    'meta_keywords' => 'nullable|string',
    'published_at' => 'nullable|date',
    'is_homepage' => 'nullable|boolean',
    'slug' => 'nullable|string|unique:pages,slug' . (isset($page) ? ',' . $page->id : ''),
]);

    $validated['slug'] = $validated['slug'] ?? Str::slug($validated['title']);
    $validated['is_homepage'] = $request->has('is_homepage');

    if ($request->hasFile('featured_image')) {
        $path = $request->file('featured_image')->store('uploads/pages', 'public');
        $validated['featured_image'] = $path;
    }

    Page::create($validated);

    return redirect()->route('admin.pages.index')->with('success', 'Halaman berhasil ditambahkan');
}
    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required',
        'status' => 'required|in:draft,published',
        'category' => 'required|in:home,profil,sertifikasi,media,informasi,kontak',
        'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'meta_description' => 'nullable|string',
        'meta_keywords' => 'nullable|string',
        'published_at' => 'nullable|date',
        'is_homepage' => 'nullable|boolean',
        'slug' => 'nullable|string|unique:pages,slug,' . $page->id,
    ]);

    $validated['slug'] = $validated['slug'] ?? Str::slug($validated['title']);
    $validated['is_homepage'] = $request->has('is_homepage');

    // Simpan gambar baru jika ada
    if ($request->hasFile('featured_image')) {
        $path = $request->file('featured_image')->store('uploads/pages', 'public');
        $validated['featured_image'] = $path;
    }

    $page->update($validated);

    return redirect()->route('admin.pages.index')->with('success', 'Halaman berhasil diperbarui');
}
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('admin.pages.index')->with('success', 'Halaman berhasil dihapus');
    }
}
