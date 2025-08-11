<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Info;
use App\Models\Kategori;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InfoController extends Controller
{
    public function index()
    {
        $info = Info::latest()->paginate(10);
        return view('info.index', compact('info')); 
    }

    public function create()
    {
        $pages = Page::all();
        $kategoris = Kategori::all(); // Ambil semua kategori
        return view('info.create', compact('pages', 'kategoris'));
    }
public function edit($id)
{
    $info = Info::findOrFail($id);
    $kategoris = Kategori::all(); // Ambil semua kategori
    $pages = Page::all(); // Ambil semua halaman statis

    return view('info.edit', compact('info', 'kategoris', 'pages'));
}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
            'status' => 'required|in:published,draft',
            'page_id' => 'nullable|exists:pages,id',
            'image' => 'nullable|image'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('info', 'public');
        }

        Info::create($validated);

        return redirect()->route('info.index')->with('success', 'Info berhasil ditambahkan');
    }
}
