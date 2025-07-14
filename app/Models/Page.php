<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'author',
        'status',
        'published_at',
        'featured_image',
        'meta_description',
        'meta_keywords',
        'is_homepage',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_homepage' => 'boolean',
    ];
}
