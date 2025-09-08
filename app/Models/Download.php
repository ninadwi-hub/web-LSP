<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Download extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'file_path',
        'category_id',
        'file_type',
        'file_size',
        'uploader',
        'status',
        'download_count'
    ];

    // Auto slug saat create
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($download) {
            $download->slug = Str::slug($download->title);
        });
    }
}
