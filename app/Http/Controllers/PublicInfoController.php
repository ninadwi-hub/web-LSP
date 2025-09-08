<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\Kategori;

class PublicInfoController extends Controller
{
    public function index()
    {
        $infos = Info::with('kategori')
            ->where('status', 'published')
            ->latest()
            ->paginate(10);

        // view: resources/views/info/show.blade.php
        return view('info.show', compact('infos'));
    }

    public function show($slug)
    {
        $info = Info::where('slug', $slug)
            ->where('status', 'published')
            ->with('kategori')
            ->firstOrFail();

        $related = Info::where('id', '!=', $info->id)
            ->where('status', 'published')
            ->latest()
            ->take(3)
            ->get();

        $page = (object) [
            'title'            => $info->title,
            'content'          => $info->content,
            'meta_description' => $info->meta_description ?? $info->title,
            'meta_keywords'    => $info->kategori->nama ?? '',
            'featured_image'   => $info->thumbnail,
        ];

        // view: resources/views/info/detail.blade.php
        return view('info.detail', compact('page', 'info', 'related'));
    }

    public function kategori($slug)
    {
        $kategori = Kategori::where('slug', $slug)->firstOrFail();

        $infos = $kategori->infos()
            ->where('status', 'published')
            ->latest()
            ->paginate(10);

        $page = (object) [
            'title'            => 'Kategori: ' . $kategori->nama,
            'content'          => '',
            'meta_description' => 'Informasi pada kategori ' . $kategori->nama,
            'meta_keywords'    => $kategori->nama,
            'featured_image'   => null,
        ];

        // view: resources/views/info/show.blade.php
        return view('info.show', compact('page', 'kategori', 'infos'));
    }
}
