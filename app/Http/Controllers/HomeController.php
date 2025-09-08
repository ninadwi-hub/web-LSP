<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Galeri;
use App\Models\Skema;

class HomeController extends Controller
{
    public function index()
    {
        
        // Untuk slider hero
        $sliderGaleri = Galeri::where('status', 'published')
                            ->latest()
                            ->take(5)
                            ->get();

        // Semua galeri (untuk gallery section)
        $galeris = Galeri::where('status', 'published')->latest()->get();

        // Featured pages
        $featuredPages = Page::where('status', 'published')
                             ->where('is_featured', true)
                             ->latest('published_at')
                             ->take(6)
                             ->get();

        // Pages per kategori
        $pagesByCategory = Page::where('status', 'published')
                               ->get()
                               ->groupBy('category');

        // Skema sertifikasi
        $skemas = Skema::orderBy('id')->get();
        
        return view('home', compact(
            'sliderGaleri',
            'galeris',
            'featuredPages',
            'pagesByCategory',
            'skemas'
        ));
    }
}
