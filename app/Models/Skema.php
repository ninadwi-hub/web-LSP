<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skema extends Model
{
    use HasFactory;

    protected $table = 'skemas';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'kode',
        'nama',
        'jenis',
        'level',
        'status',
        'kategori',
        'slug',
        'thumbnail',
        'pdf_path',
        'ringkasan',
        'file_skema',
    ];

    public function unitKompetensi()
    {
        return $this->hasMany(UnitKompetensi::class, 'skema_id', 'id');
    }

    public function jadwalAsesmens()
    {
        return $this->hasMany(JadwalAsesmen::class, 'skema_id', 'id');
    }

    // Accessor untuk URL thumbnail
    public function getThumbnailUrlAttribute()
    {
        if ($this->thumbnail) {
            return asset('storage/' . $this->thumbnail);
        }
        return asset('images/default-skema.jpg');
    }

    // Status otomatis
    public function getStatusAttribute()
    {
        if ($this->tanggal_mulai && $this->tanggal_selesai) {
            return Carbon::now()->between($this->tanggal_mulai, $this->tanggal_selesai) ? 'aktif' : 'nonaktif';
        }
        return 'nonaktif';
    }
    // Accessor untuk URL PDF
    public function getPdfUrlAttribute()
    {
        if ($this->pdf_path) {
            return asset('storage/' . $this->pdf_path);
        }
        return null;
    }

    // Accessor untuk URL file skema
    public function getFileUrlAttribute()
    {
        if ($this->file_skema) {
            return asset('storage/' . $this->file_skema);
        }
        return null;
    }
}
