<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Info; // pastikan ini di-import jika menggunakan relasi

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategoris';

    protected $fillable = [
        'nama',
        'deskripsi',
    ];

    public function infos()
    {
        return $this->hasMany(Info::class);
    }
}

