<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Galeri;

class FrontendController extends Controller
{
    /**
     * Menampilkan halaman kontak publik
     */
    public function showKontak()
    {
        return view('kontak.index');
    }

    /**
     * Menampilkan halaman fallback berbasis slug
     */
    public function show($slug)
{
    $page = Page::where('slug', $slug)
        ->where('status', 'published')
        ->firstOrFail();

    return view('page.show', compact('page'));
}


    /**
     * Halaman beranda (jika digunakan di rute /)
     */

public function home()
{
    $pages = Page::where('status', 'published')->get();
    $pagesByCategory = $pages->groupBy('category');

    $sliderGaleri = Galeri::where('status', 'published')
        ->where('is_featured', true)
        ->take(5)
        ->get();

    $galeris = Galeri::where('status', 'published')
        ->latest()
        ->paginate(6);
        
    return view('home', compact('pagesByCategory', 'sliderGaleri', 'galeris'));
}

}