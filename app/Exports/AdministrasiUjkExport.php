<?php

namespace App\Exports;

use App\Models\PendaftaranAsesmen;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AdministrasiUjkExport implements FromCollection, WithHeadings
{
    protected $status;

    public function __construct($status = null)
    {
        $this->status = $status;
    }

    /**
     * Ambil data untuk diexport
     */
    public function collection()
    {
        $query = PendaftaranAsesmen::with('biodata'); // ✅ ikutkan relasi

        if ($this->status) {
            $query->where('status_administrasi', $this->status);
        }

        // ✅ gunakan map agar bisa ambil data dari tabel relasi
        return $query->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'nama_lengkap' => $item->biodata->nama_lengkap ?? '-', // ambil dari relasi
                'email' => $item->biodata->email ?? '-',               // bisa juga email dari biodata
                'no_hp' => $item->biodata->no_hp ?? '-',
                'skema' => $item->jadwal->skema->nama_skkni ?? '-',   // optional kalau ada relasi ke skema
                'status' => $item->status_administrasi ?? '-',
                'created_at' => $item->created_at?->format('Y-m-d H:i:s') ?? '-',
            ];
        });
    }

    /**
     * Header kolom di Excel
     */
    public function headings(): array
    {
        return [
            'ID',
            'Nama Lengkap',
            'Email',
            'No HP',
            'Skema',
            'Status',
            'Tanggal Daftar',
        ];
    }
}
