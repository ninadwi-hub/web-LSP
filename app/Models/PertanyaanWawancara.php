<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PertanyaanWawancara extends Model
{
    use HasFactory;

    protected $fillable = [
        'skema_id',
        'unit_kompetensi_id',
        'pertanyaan',
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
