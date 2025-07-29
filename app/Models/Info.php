<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Info extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = [
        'kategori_id', 'title', 'slug', 'content', 'thumbnail', 'views'
    ];

    // Relasi ke kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    // Slug otomatis saat create
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($info) {
            $info->slug = Str::slug($info->title);
        });

        static::updating(function ($info) {
            $info->slug = Str::slug($info->title);
        });
    }
}
