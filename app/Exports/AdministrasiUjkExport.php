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
        $query = PendaftaranAsesmen::query();

        if ($this->status) {
            $query->where('status', $this->status);
        }

        return $query->get([
            'id',
            'nama_lengkap',
            'email',
            'no_hp',
            'skema',
            'status',
            'created_at',
        ]);
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
