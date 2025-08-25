<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skema;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SkemaController extends Controller
{
    public function index()
    {
        $skemas = Skema::withCount('unitKompetensi')->latest('id')->paginate(10);
        return view('panell.skema.index', compact('skemas'));
    }

    public function create()
    {
        return view('panell.skema.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode' => 'required|string|max:100',
            'nama' => 'required|string|max:255',
            'ringkasan' => 'nullable|string',
            'thumbnail' => 'nullable|image|max:2048',
            'pdf' => 'nullable|mimes:pdf|max:20480',
            'slug' => 'nullable|string|max:255|unique:skemas,slug',
        ]);

        $data['slug'] = $data['slug'] ?? Str::slug($data['nama']);
        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('skema/thumb','public');
        }
        if ($request->hasFile('pdf')) {
            $data['pdf_path'] = $request->file('pdf')->store('skema/pdf','public');
        }
        if ($request->hasFile('file_skema')) {
    $filename = time() . '_' . $request->file('file_skema')->getClientOriginalName();
    $request->file('file_skema')->move(public_path('assets/files/skema_sertifikasi'), $filename);
    $skema->file_skema = $filename;
}

        Skema::create($data);
        return redirect()->route('panell.skema.index')->with('success','Skema ditambahkan.');
    }

    public function edit(Skema $skema)
    {
        return view('panell.skema.edit', compact('skema'));
    }

    public function update(Request $request, Skema $skema)
    {
        $data = $request->validate([
            'kode' => 'required|string|max:100',
            'nama' => 'required|string|max:255',
            'ringkasan' => 'nullable|string',
            'thumbnail' => 'nullable|image|max:2048',
            'pdf' => 'nullable|mimes:pdf|max:20480',
            'slug' => "nullable|string|max:255|unique:skemas,slug,{$skema->id}",
        ]);

        if (!empty($data['slug'])) {
            $skema->slug = $data['slug'];
        }

        if ($request->hasFile('thumbnail')) {
            if ($skema->thumbnail) Storage::disk('public')->delete($skema->thumbnail);
            $skema->thumbnail = $request->file('thumbnail')->store('skema/thumb','public');
        }
        if ($request->hasFile('pdf')) {
            if ($skema->pdf_path) Storage::disk('public')->delete($skema->pdf_path);
            $skema->pdf_path = $request->file('pdf')->store('skema/pdf','public');
        }
        if ($request->hasFile('file_skema')) {
    $filename = time() . '_' . $request->file('file_skema')->getClientOriginalName();
    $request->file('file_skema')->move(public_path('assets/files/skema_sertifikasi'), $filename);
    $skema->file_skema = $filename;
}

        $skema->kode = $data['kode'];
        $skema->nama = $data['nama'];
        $skema->ringkasan = $data['ringkasan'] ?? null;
        $skema->save();

        return redirect()->route('panell.skema.index')->with('success','Skema diperbarui.');
    }

    public function destroy(Skema $skema)
    {
        if ($skema->thumbnail) Storage::disk('public')->delete($skema->thumbnail);
        if ($skema->pdf_path) Storage::disk('public')->delete($skema->pdf_path);
        $skema->delete();
        return back()->with('success','Skema dihapus.');
    }
}
