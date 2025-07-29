<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; 
use App\Models\GalleryCategory;

class Galeri extends Model
{
    protected $table = 'galleries';

    protected $fillable = [
        'title', 'slug', 'description', 'image_path', 'category_id',
        'album_id', 'uploader', 'status', 'taken_at', 'is_featured'
    ];

    public function category()
    {
        return $this->belongsTo(GalleryCategory::class, 'category_id');
    }

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($galeri) {
            $galeri->slug = Str::slug($galeri->title);
        });
    }
}
