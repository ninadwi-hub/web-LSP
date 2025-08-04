<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Models\Page;

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

    return view('home', compact('galeris','featuredPages', 'pagesByCategory'));
}

}
