<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnitKompetensi extends Model
{
    protected $table = 'unit_kompetensis';

    protected $fillable = [
        'kode', 'judul', 'deskripsi', 'skema_id'
    ];

    public function skema()
    {
        return $this->belongsTo(Skema::class, 'skema_id', 'id');
    }
    public function asesmen()
{
    return $this->belongsToMany(PendaftaranAsesmen::class, 'asesmen_units', 'unit_id', 'asesmen_id')
                ->withPivot(['observasi', 'portofolio', 'wawancara', 'pertanyaan_lisan', 'pertanyaan_tertulis', 'tes_praktik', 'projek_kerja', 'lainnya']);
}

}
