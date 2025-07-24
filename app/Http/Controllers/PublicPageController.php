<?php

namespace App\Http\Controllers;

use App\Models\Page;

class PublicPageController extends Controller
{
    public function show($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('pages.show', compact('page'));
    }
}

