<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view('pages.index', compact('pages'));
    }

    public function create()
    {
        return view('pages.create');
    }

   public function store(Request $request)
{
    $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'category' => 'required|in:profil,informasi', // tambahkan validasi kategori
        'status' => 'required|in:published,draft',    // validasi status
    ]);

    Page::create([
        'title' => $request->title,
        'slug' => Str::slug($request->title),
        'content' => $request->content,
        'category' => $request->category,
        'status' => $request->status,
    ]);

    return redirect()->route('pages.index')->with('success', 'Halaman berhasil dibuat.');
}


    public function edit(Page $page)
    {
        return view('pages.edit', compact('page'));
    }

   public function update(Request $request, Page $page)
{
    $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'category' => 'required|in:profil,informasi',
        'status' => 'required|in:published,draft',
    ]);

    $page->update([
        'title' => $request->title,
        'slug' => Str::slug($request->title),
        'content' => $request->content,
        'category' => $request->category,
        'status' => $request->status,
    ]);

    return redirect()->route('pages.index')->with('success', 'Halaman diperbarui.');
}

    public function destroy(Page $page)
    {
        $page->delete();
        return back()->with('success', 'Halaman dihapus.');
    }
    public function show($slug)
{
    $page = Page::where('slug', $slug)->firstOrFail();
    return view('pages.show', compact('page'));
}

}
