<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Page extends Model
{
    protected $fillable = [
        'title', 'slug', 'content', 'status', 'category', 'is_featured', 'featured_image',
    ];

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

protected static function boot()
{
    parent::boot();

    static::creating(function ($page) {
        if (empty($page->slug)) {
            $page->slug = Str::slug($page->title);
        }
    });
}
public function infos()
{
    return $this->hasMany(Info::class);
}

}






