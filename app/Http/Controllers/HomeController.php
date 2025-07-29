<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;

class HomeController extends Controller
{
    public function index()
    {
        // Semua galeri
        $galeris = Galeri::where('status', 'published')->latest()->get();

        // Galeri yang ditampilkan di slider (hanya yang is_featured = 1)
        $featuredGaleri = Galeri::where('status', 'published')
                                ->where('is_featured', true)
                                ->latest()
                                ->take(5)
                                ->get();

        return view('home', compact('galeris', 'featuredGaleri'));
    }
}
