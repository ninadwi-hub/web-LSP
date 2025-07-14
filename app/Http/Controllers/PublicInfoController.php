<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Info;

class PublicInfoController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::with('infos')->get();
        return view('public.infos', compact('kategoris'));
    }

    public function show($id)
    {
        $info = Info::findOrFail($id);
        return view('public.show', compact('info'));
    }
}
