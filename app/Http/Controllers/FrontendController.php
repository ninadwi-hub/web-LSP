<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Galeri;
use App\Models\Kategori;
use App\Models\Info;

class FrontendController extends Controller
{
    /**
     * Menampilkan halaman kontak publik
     */
    public function showKontak()
    {
        return view('kontak');
    }

    /**
     * Menampilkan halaman fallback berbasis slug (untuk Page)
     */
    public function show($slug)
    {
        $page = Page::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        return view('page.show', compact('page'));
    }

    /**
     * Halaman beranda
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

    /**
     * Menampilkan halaman Page beserta Info terkait
     */
    public function showPage($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();

        // Ambil semua info yang terhubung ke page ini
        $infos = Info::where('page_id', $page->id)
            ->where('status', 'published')
            ->latest()
            ->get();

        return view('page.show', compact('page', 'infos'));
    }

    /**
     * Menampilkan daftar kategori
     */
    public function index()
    {
        $kategoris = Kategori::orderBy('nama')->get();
        return view('home', compact('kategoris'));
    }

    /**
     * Menampilkan halaman detail Info
     */
    public function showInfo($slug)
    {
        $info = Info::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        // Ambil page terkait (jika ada) supaya layout sama
        $page = $info->page ?? null;

        return view('info.show', compact('info', 'page'));
    }
    public function showSkemaSertifikasi()
{
    // Pastikan page_id sesuai ID halaman Skema Sertifikasi
    $pageId = Page::where('slug', 'skema_sertifikasi')->value('id');

    $skemas = Info::where('page_id', $pageId)
                ->where('status', 'published')
                ->orderBy('created_at', 'desc')
                ->get();

    return view('frontend.skema_sertifikasi', compact('skemas'));
}

}
