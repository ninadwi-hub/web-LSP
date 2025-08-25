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
}
