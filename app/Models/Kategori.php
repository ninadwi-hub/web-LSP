<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'slug', 'deskripsi'];

    // Relasi ke Info
    public function infos()
{
    return $this->hasMany(Info::class, 'kategori_id');
}


    // Slug otomatis saat create
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($kategori) {
            $kategori->slug = Str::slug($kategori->nama);
        });

        static::updating(function ($kategori) {
            $kategori->slug = Str::slug($kategori->nama);
        });
    }
}
