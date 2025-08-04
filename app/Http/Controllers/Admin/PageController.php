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
        $pages = Page::all();
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'status' => 'required|in:draft,published,archived',
            'category' => 'required|in:profil,sertifikasi,media,informasi',
            'featured_image' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'published_at' => 'nullable|date',
            'is_homepage' => 'nullable|boolean',
            'slug' => 'nullable|string|unique:pages,slug',
        ]);

        // Set slug otomatis jika kosong
        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['title']);

        // Checkbox yang tidak dicentang akan nilainya null, jadi kita default-kan ke false
        $validated['is_homepage'] = $request->has('is_homepage');

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
            'status' => 'required|in:draft,published,archived',
            'category' => 'required|in:profil,sertifikasi,media,informasi',
            'featured_image' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'published_at' => 'nullable|date',
            'is_homepage' => 'nullable|boolean',
            'slug' => 'nullable|string|unique:pages,slug,' . $page->id,
        ]);

        // Set slug otomatis jika kosong
        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['title']);

        // Checkbox yang tidak dicentang akan nilainya null, jadi kita default-kan ke false
        $validated['is_homepage'] = $request->has('is_homepage');

        $page->update($validated);

        return redirect()->route('admin.pages.index')->with('success', 'Halaman berhasil diperbarui');
    }

    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('admin.pages.index')->with('success', 'Halaman berhasil dihapus');
    }
}
