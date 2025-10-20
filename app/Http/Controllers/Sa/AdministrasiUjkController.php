<?php

namespace App\Http\Controllers\Sa;

use App\Http\Controllers\Controller;
use App\Models\PendaftaranAsesmen;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AdministrasiUjkExport;

class AdministrasiUjkController extends Controller
{
    /**
     * 📄 Tampilkan daftar Administrasi UJK
     */
    public function index(Request $request)
    {
        $query = PendaftaranAsesmen::with(['biodata']);

        // Filter status pembayaran
        if ($request->filled('status')) {
            if ($request->status === 'selesai') {
                $query->whereNotNull('tanggal_pembayaran');
            } elseif ($request->status === 'belum') {
                $query->whereNull('tanggal_pembayaran');
            }
        }

        $asesmens = $query->orderBy('created_at', 'desc')->paginate(10);

        // View-nya diletakkan di: resources/views/sa/sertifikasi/administrasi_ujk/index.blade.php
        return view('sa.sertifikasi.administrasi_ujk.index', compact('asesmens'));
    }

    /**
     * 📝 Form edit administrasi UJK
     */
    public function edit($id)
    {
        $data = PendaftaranAsesmen::with('biodata')->findOrFail($id);

        // View: resources/views/sa/sertifikasi/administrasi_ujk/edit.blade.php
        return view('sa.sertifikasi.administrasi_ujk.edit', compact('data'));
    }

    /**
     * 📊 Export data ke Excel
     */
    public function exportExcel(Request $request)
    {
        $status = $request->get('status'); // bisa null, 'selesai', atau 'belum'
        $fileName = 'Administrasi_UJK_' . now()->format('Ymd_His') . '.xlsx';

        return Excel::download(new AdministrasiUjkExport($status), $fileName);
    }
}
