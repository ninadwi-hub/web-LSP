<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['judul', 'gambar', 'tipe_tampilan'];
}
