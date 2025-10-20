<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendaftaranAsesmen extends Model
{
    protected $table = 'pendaftaran_asesmens';
   protected $fillable = [
    'biodata_asesi_id',
    'dokumen_asesi_id',
    'tujuan_asesmen',
    'tuk',
    'jadwal_uji',
    'metode_uji',
    'keterangan_teknis',
    'status_administrasi',
    'jumlah_pembayaran',
    'sumber_pendanaan',
    'metode_pembayaran',
    'no_rekening',
    'nama_rekening',
    'tanggal_pembayaran',
    'bukti_pembayaran',
];


    // Relasi
    public function biodata() {
    return $this->belongsTo(BiodataAsesi::class, 'biodata_asesi_id');
}

public function dokumen() {
    return $this->belongsTo(DokumenAsesi::class, 'dokumen_asesi_id');
}


    public function jadwal()
{
    return $this->belongsTo(JadwalAsesmen::class, 'jadwal_id');
}


    // Relasi ke unit kompetensi (step 6)
    public function units() {
        return $this->belongsToMany(UnitKompetensi::class, 'pendaftaran_unit', 'pendaftaran_id', 'unit_id');
    }
}
