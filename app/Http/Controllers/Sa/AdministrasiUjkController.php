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
 * 🔄 Update data Administrasi UJK
 */
public function update(Request $request, $id)
{
    $data = PendaftaranAsesmen::findOrFail($id);

    // Validasi input
    $validated = $request->validate([
        'status_administrasi' => 'nullable|string',
        'jumlah_pembayaran' => 'nullable|numeric',
        'sumber_pendanaan' => 'nullable|string',
        'metode_pembayaran' => 'nullable|string',
        'no_rekening' => 'nullable|string',
        'nama_rekening' => 'nullable|string',
        'tanggal_pembayaran' => 'nullable|date',
        'bukti_pembayaran' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'rekomendasi' => 'nullable|string',
        'catatan' => 'nullable|string',
    ]);

    // Jika ada file bukti pembayaran baru
    if ($request->hasFile('bukti_pembayaran')) {
        $file = $request->file('bukti_pembayaran');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/bukti_pembayaran'), $fileName);
        $validated['bukti_pembayaran'] = $fileName;
    }

    // Update data
    $data->update($validated);

    return redirect()
        ->route('sa.sertifikasi.administrasi_ujk.index')
        ->with('success', 'Data Administrasi UJK berhasil diperbarui.');
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
