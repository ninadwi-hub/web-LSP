<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Info;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'deskripsi'];

    // Hapus booted() karena tidak ada kolom slug
}
