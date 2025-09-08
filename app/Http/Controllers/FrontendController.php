<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Galeri;
use App\Models\Kategori;
use App\Models\Info;
use App\Models\Skema;
use App\Models\UnitKompetensi;
use App\Models\Download; 
class FrontendController extends Controller
{

    /**
     * Menampilkan halaman fallback berbasis slug (untuk Page)
     */
    public function show($slug)
{
    $page = Page::where('slug', $slug)
        ->where('status', 'published')
        ->firstOrFail();

    // Jika halaman ini adalah skema sertifikasi
    if ($slug === 'skema-sertifikasi') {
        $skemaList = Skema::withCount('unitKompetensi')->orderBy('nama')->get();
        return view('frontend.skema.statis', compact('page', 'skemaList'));
    }

    // Halaman statis biasa
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
        $skemas = Skema::orderBy('id')->get();
        
        return view('home', compact('pagesByCategory', 'sliderGaleri', 'galeris','skemas'));
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

    public function skemaSertifikasi()
{
    // Ambil page "Skema Sertifikasi" dari admin
    $page = Page::where('slug', 'skema-sertifikasi')
        ->where('status', 'published')
        ->first();

    // Ambil daftar skema + jumlah unit kompetensi
    $skemaList = Skema::withCount('unitKompetensi')
        ->orderBy('nama')
        ->get();
     $skemas = Skema::orderBy('nama')->get();
    return view('frontend.skema.index', compact('page', 'skemaList','skemas'));
}

public function skemaIndex()
{
    $skemaList = Skema::withCount('unitKompetensi')->orderBy('nama')->get();
    return view('frontend.skema.index', compact('skemaList'));
}
public function skemaDetail($id)
{
    // Load skema + unit kompetensinya
    $skema = \App\Models\Skema::with('unitKompetensi')->findOrFail($id);

    return view('frontend.skema.detail', compact('skema'));
}
    /**
     * Halaman publik daftar file download
     */
    public function downloads()
    {
        $downloads = Download::where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('frontend.downloads.index', compact('downloads'));
    }

}
