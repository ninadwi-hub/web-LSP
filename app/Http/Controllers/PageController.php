<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    // Halaman home (jika ingin pakai)
    // Halaman Home
public function home()
{
    $pages = Page::where('status', 'published')
        ->where(function($q) {
            $q->whereNull('published_at')
              ->orWhere('published_at', '<=', now());
        })
        ->get();

    $menus = \App\Models\Menu::with('page', 'children.page')->where('is_active', 1)->get();

    return view('home', compact('pages', 'menus'));
}

// Show page detail
public function show($slug)
{
    $page = Page::where('slug', $slug)
        ->where('status', 'published')
        ->where(function($q) {
            $q->whereNull('published_at')
              ->orWhere('published_at', '<=', now());
        })
        ->firstOrFail();

    $menus = \App\Models\Menu::with('page', 'children.page')->where('is_active', 1)->get();

    return view('page.show', compact('page', 'menus'));
}
    
}
