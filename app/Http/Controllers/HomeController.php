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
        $galeris = Galeri::where('status', 'published')->latest()->get();

        $featuredPages = Page::where('status', 'published')
                             ->where('is_featured', true)
                             ->latest('published_at')
                             ->take(6)
                             ->get();

        $pagesByCategory = Page::where('status', 'published')
                               ->get()
                               ->groupBy('category');

        // Ambil semua skema (tanpa kolom 'status' karena tidak ada di tabel)
        $skemas = Skema::orderBy('id')->get();

        // ⬅️ pastikan nama view sesuai file yang kamu edit!
        return view('home', compact('galeris','featuredPages','pagesByCategory','skemas'));
        // Kalau file view kamu memang 'home.blade.php', pakai:
        // return view('home', compact('galeris','featuredPages','pagesByCategory','skemas'));
    }
}
