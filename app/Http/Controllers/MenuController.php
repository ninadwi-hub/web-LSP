<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
{
    $menus = Menu::with('parent')->orderBy('order')->get();
    return view('menus.index', compact('menus'));
}

public function create()
{
    $parents = Menu::whereNull('parent_id')->get();
    return view('menus.create', compact('parents'));
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'type' => 'required|in:internal,external',
        'slug' => 'nullable',
        'url' => 'nullable|url',
        'order' => 'nullable|integer',
        'parent_id' => 'nullable|exists:menus,id',
        'is_active' => 'boolean',
    ]);

    Menu::create($request->all());
    return redirect()->route('menus.index')->with('success', 'Menu berhasil ditambahkan.');
}
public function edit($id)
{
    $menu = Menu::findOrFail($id);
    $parents = Menu::whereNull('parent_id')->where('id', '!=', $id)->get();

    return view('menus.edit', compact('menu', 'parents'));
}

}
