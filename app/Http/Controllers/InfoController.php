<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\Kategori;

class InfoController extends Controller
{
    // Halaman list info berdasarkan kategori
    public function index()
    {
        $infos = Info::whereHas('kategori')
            ->latest()
            ->paginate(10);

        return view('public.info.indexp', compact('infos'));
    }

    // Halaman detail info (pakai layout page.show)
    public function show($slug)
    {
        $info = Info::where('slug', $slug)
            ->with('kategori')
            ->firstOrFail();

        $page = (object) [
            'title' => $info->title,
            'content' => $info->content,
            'meta_description' => $info->meta_description ?? '',
            'meta_keywords' => $info->meta_keywords ?? '',
            'featured_image' => $info->thumbnail,
        ];

        return view('page.show', compact('page', 'info'));
    }

    // Halaman list info per kategori
    public function kategori($slug)
    {
        $kategori = Kategori::where('slug', $slug)->firstOrFail();
        $infos = $kategori->infos()->latest()->paginate(10);

        $page = (object) [
            'title' => 'Kategori: ' . $kategori->name,
            'content' => '',
            'meta_description' => 'Informasi pada kategori ' . $kategori->name,
            'meta_keywords' => $kategori->name,
            'featured_image' => null,
        ];

        return view('page.show', compact('page', 'kategori', 'infos'));
    }
}
