<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;

    // Tambahkan 'slug' di sini
    protected $fillable = [
    'title',
    'slug',
    'content',
    'thumbnail',
    'kategori_id',
];


    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'category_id');
    }
}
