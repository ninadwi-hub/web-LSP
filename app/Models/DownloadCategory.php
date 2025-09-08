<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DownloadCategory extends Model
{
    use HasFactory;

    protected $table = 'download_categories';

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    // otomatis generate slug kalau tidak ada
    public static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });

        static::updating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    // relasi ke tabel downloads (jika ada)
    public function downloads()
    {
        return $this->hasMany(Download::class, 'category_id');
    }
}
