<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
protected $fillable = ['title', 'type', 'page_id', 'url', 'route', 'parent_id', 'order', 'is_active'];

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id');
    }

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id')->with('page', 'children');
    }

}
