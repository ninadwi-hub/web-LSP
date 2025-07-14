<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    // Nama tabel eksplisit
    protected $table = 'downloads';

    protected $fillable = [
        'title', 'slug', 'description', 'file_path', 'category_id',
        'file_type', 'file_size', 'uploader', 'status', 'download_count'
    ];
}
