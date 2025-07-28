<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use App\Models\Info;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil 5 gambar terbaru dari galeri dengan status 'published'
        $slides = Galeri::where('status', 'published')
                        ->orderBy('created_at', 'desc')
                        ->take(5)
                        ->get();

        // Ambil 5 info terbaru
        $latestInfos = Info::latest()->take(5)->get();

        // Ambil 5 info populer (jika ada kolom 'views')
        $popularInfos = Info::orderBy('views', 'desc')->take(5)->get();

        return view('admin.dashboard', compact('slides', 'latestInfos', 'popularInfos'));
    }
}