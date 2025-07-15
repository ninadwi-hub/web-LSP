<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galleries'; // ⬅️ WAJIB ditambah karena nama tabel tidak default plural-nya

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image_path',
        'category_id',
        'album_id',
        'uploader',
        'status',
        'taken_at',
        'is_featured',
    ];

    public function category() {
        return $this->belongsTo(GalleryCategory::class);
    }

    public function album() {
        return $this->belongsTo(Album::class);
    }
}
