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
        'kategori_id',
        'page_id',
        'title',
        'content',
        'status',
        'slug',
        'thumbnail',
        'is_active',
    ];

    // Relasi ke kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    // Relasi ke page (halaman statis)
    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    // Slug otomatis saat create & update
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
