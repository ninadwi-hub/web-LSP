<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubstansiWawancara extends Model
{
    use HasFactory;

    protected $fillable = [
        'skema_id',
        'unit_kompetensi_id',
        'nomor_elemen',
        'substansi',
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
