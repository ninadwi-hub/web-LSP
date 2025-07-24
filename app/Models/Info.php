<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Info extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_id', 'title', 'slug', 'content', 'thumbnail'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}

