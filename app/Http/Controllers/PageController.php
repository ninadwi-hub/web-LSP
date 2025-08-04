<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    // Halaman home (jika ingin pakai)
    public function home()
    {
        $pages = Page::where('status', 'published')->get();
        return view('home', compact('pages'));
    }

    // Menampilkan halaman berdasarkan slug
    public function show($slug)
    {
        $page = Page::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        return view('page.show', compact('page'));
    }
}
