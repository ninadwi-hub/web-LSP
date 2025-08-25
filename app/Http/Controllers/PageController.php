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
    $menus = Menu::with('page', 'children.page')->where('is_active', 1)->get();

    return view('home', compact('pages', 'menus'));
}

public function show($slug)
{
    $page = Page::where('slug', $slug)
        ->where('status', 'published')
        ->firstOrFail();

    $menus = Menu::with('page', 'children.page')->where('is_active', 1)->get();

    return view('page.show', compact('page', 'menus'));
}
    
}
