<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus'; // nama tabel eksplisit

    protected $fillable = [
        'title',
        'url',
        'order',
        'is_active',
    ];
}


