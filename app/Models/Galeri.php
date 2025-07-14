<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{

    protected $table = 'galleries';

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

    protected $casts = [
        'taken_at' => 'date',
        'is_featured' => 'boolean',
    ];
}
