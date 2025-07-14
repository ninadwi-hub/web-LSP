<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
use HasFactory;

protected $fillable = ['category_id', 'title', 'content', 'thumbnail'];

public function kategori()
{
    return $this->belongsTo(Kategori::class, 'category_id');
}
}
