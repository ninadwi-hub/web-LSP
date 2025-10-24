<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenPortofolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'skema_id',
        'unit_kompetensi_id',
        'dokumen_portofolio',
    ];

    public function skema()
    {
        return $this->belongsTo(Skema::class);
    }

    public function unitKompetensi()
    {
        return $this->belongsTo(UnitKompetensi::class, 'unit_kompetensi_id');
    }
}
