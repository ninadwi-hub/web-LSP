<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendaftaranAsesmen extends Model
{
    protected $table = 'pendaftaran_asesmens';
    protected $fillable = [
        'biodata_id',
        'dokumen_id',
        'tujuan_asesmen',
        'tuk',
        'jadwal_uji',
        'metode_uji',
        'keterangan_teknis',
    ];

    // Relasi
    public function biodata() {
        return $this->belongsTo(BiodataAsesi::class, 'biodata_id');
    }

    public function dokumen() {
        return $this->belongsTo(DokumenAsesi::class, 'dokumen_id');
    }

    // Relasi ke unit kompetensi (step 6)
    public function units() {
        return $this->belongsToMany(UnitKompetensi::class, 'pendaftaran_unit', 'pendaftaran_id', 'unit_id');
    }
}
