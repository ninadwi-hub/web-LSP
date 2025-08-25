<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skema extends Model
{
    protected $table = 'skemas';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'kode',
        'nama',
        'kategori',
        'slug',
        'thumbnail',
        'pdf_path',
        'ringkasan',
    ];

    public function unitKompetensi()
    {
        return $this->hasMany(UnitKompetensi::class, 'skema_id', 'id');
    }
}

