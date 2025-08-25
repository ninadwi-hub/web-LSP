<?php

namespace App\Http\Controllers;

use App\Models\Skema;

class SkemaPublicController extends Controller
{
    public function index()
    {
        // tampilkan daftar by id desc + jumlah unit
        $skemas = Skema::withCount('unitKompetensi')->orderByDesc('id')->get();
        return view('frontend.skema.index', compact('skemas'));
    }

    public function show($slugOrId)
    {
        $skema = Skema::with('unitKompetensi')
            ->when(is_numeric($slugOrId), fn($q) => $q->where('id', $slugOrId))
            ->when(!is_numeric($slugOrId), fn($q) => $q->where('slug', $slugOrId))
            ->firstOrFail();

        return view('frontend.skema.detail', compact('skema'));
    }
}
