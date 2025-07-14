<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::latest()->get();
        return view('pages.index', compact('pages'));
    }

    public function create()
    {
        return view('pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        Page::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'author' => auth()->user()->name ?? 'admin',
            'status' => $request->status ?? 'draft',
            'published_at' => $request->published_at,
            'featured_image' => $request->featured_image,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'is_homepage' => $request->has('is_homepage'),
        ]);

        return redirect()->route('pages.index')->with('success', 'Halaman berhasil ditambahkan.');
    }

    public function edit(Page $page)
    {
        return view('pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        $page->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'author' => auth()->user()->name ?? 'admin',
            'status' => $request->status ?? 'draft',
            'published_at' => $request->published_at,
            'featured_image' => $request->featured_image,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'is_homepage' => $request->has('is_homepage'),
        ]);

        return redirect()->route('pages.index')->with('success', 'Halaman berhasil diperbarui.');
    }

    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('pages.index')->with('success', 'Halaman berhasil dihapus.');
    }

    // ✅ Tampilkan halaman publik berdasarkan slug
    public function show($slug)
    {
        $page = Page::where('slug', $slug)->where('status', 'published')->firstOrFail();
        return view('pages.show', compact('page'));
    }
}
