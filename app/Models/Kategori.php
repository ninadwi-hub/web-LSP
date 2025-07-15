<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Info; // pastikan ini di-import jika menggunakan relasi
use Illuminate\Support\Str;

class Kategori extends Model
{
    protected $fillable = ['nama', 'slug', 'deskripsi'];

    protected static function booted()
    {
        static::creating(function ($kategori) {
            $kategori->slug = Str::slug($kategori->nama);
        });

        // Opsional: saat update juga perbarui slug
        static::updating(function ($kategori) {
            $kategori->slug = Str::slug($kategori->nama);
        });
    }
}



