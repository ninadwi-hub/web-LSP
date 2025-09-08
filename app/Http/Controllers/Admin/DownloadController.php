<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; 
use App\Models\Download;
use App\Models\DownloadCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DownloadController extends Controller
{
    /**
     * Daftar semua file download (Admin)
     */
    public function index()
    {
        $downloads = Download::latest()->paginate(10);
        return view('admin.downloads.index', compact('downloads'));
    }

    /**
     * Form tambah file
     */
    public function create()
    {
        $categories = DownloadCategory::all();
        return view('admin.downloads.create', compact('categories'));
    }

    /**
     * Simpan file baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'file_path'   => 'required|file|max:51200', // max 50 MB
            'category_id' => 'nullable|exists:download_categories,id',
            'uploader'    => 'nullable|string|max:255',
            'status'      => 'required|in:draft,published,archived',
        ]);

        // simpan file
        $path = $request->file('file_path')->store('downloads', 'public');

        // ambil info file
        $file     = $request->file('file_path');
        $fileType = $file->getClientOriginalExtension();
        $fileSize = $file->getSize();

        // simpan data
        Download::create([
            'title'       => $request->title,
            'slug'        => Str::slug($request->title),
            'description' => $request->description,
            'file_path'   => $path,
            'file_type'   => $fileType,
            'file_size'   => $fileSize,
            'uploader'    => $request->uploader ?? auth()->user()->name ?? 'Admin',
            'status'      => $request->status,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('downloads.index')->with('success', 'File berhasil ditambahkan.');
    }

    /**
     * Form edit
     */
    public function edit(Download $download)
    {
        $categories = DownloadCategory::all();
        return view('admin.downloads.edit', compact('download', 'categories'));
    }

    /**
     * Update data
     */
    public function update(Request $request, Download $download)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'file_path'   => 'nullable|file|max:51200',
            'category_id' => 'nullable|exists:download_categories,id',
            'uploader'    => 'nullable|string|max:255',
            'status'      => 'required|in:draft,published,archived',
        ]);

        $data = [
            'title'       => $request->title,
            'slug'        => Str::slug($request->title),
            'description' => $request->description,
            'uploader'    => $request->uploader ?? auth()->user()->name ?? 'Admin',
            'status'      => $request->status,
            'category_id' => $request->category_id,
        ];

        // kalau ada file baru, hapus lama & upload baru
        if ($request->hasFile('file_path')) {
            if ($download->file_path && Storage::disk('public')->exists($download->file_path)) {
                Storage::disk('public')->delete($download->file_path);
            }

            $path     = $request->file('file_path')->store('downloads', 'public');
            $file     = $request->file('file_path');
            $fileType = $file->getClientOriginalExtension();
            $fileSize = $file->getSize();

            $data['file_path'] = $path;
            $data['file_type'] = $fileType;
            $data['file_size'] = $fileSize;
        }

        $download->update($data);

        return redirect()->route('downloads.index')->with('success', 'File berhasil diperbarui.');
    }

    /**
     * Hapus data
     */
    public function destroy(Download $download)
    {
        if ($download->file_path && Storage::disk('public')->exists($download->file_path)) {
            Storage::disk('public')->delete($download->file_path);
        }

        $download->delete();

        return redirect()->route('downloads.index')->with('success', 'File berhasil dihapus.');
    }

    /**
     * Frontend: daftar file download
     */
    public function publicIndex()
    {
        $downloads = Download::where('status', 'published')->latest()->paginate(10);
        return view('frontend.downloads.index', compact('downloads'));
    }

    /**
     * Frontend: detail & download file
     */
    public function show($slug)
    {
        $download = Download::where('slug', $slug)->where('status', 'published')->firstOrFail();
        return view('frontend.downloads.show', compact('download'));
    }
}
