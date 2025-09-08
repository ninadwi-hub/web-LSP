<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Page;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
       $datamenu = Menu::orderBy('order')->paginate(10); // 10 item per halaman
        return view('menus.index', compact('datamenu'));
    }

    public function create()
    {
        $parents = Menu::whereNull('parent_id')->get();
        $pages = Page::where('status', 'published')->get();
        return view('menus.create', compact('parents', 'pages'));
    }

    public function store(Request $request)
    {
        $request->validate([
    'title'     => 'required',
    'type'      => 'required|in:internal,external,route',
    'page_id'   => 'nullable|exists:pages,id',
    'url'       => 'nullable|string',   // bukan url, biar bisa slug atau path
    'route'     => 'nullable|string',
    'order'     => 'nullable|integer',
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
        $pages = Page::where('status', 'published')->get();

        return view('menus.edit', compact('menu', 'parents', 'pages'));
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

       $request->validate([
    'title'     => 'required',
    'type'      => 'required|in:internal,external,route',
    'page_id'   => 'nullable|exists:pages,id',
    'url'       => 'nullable|string',   // bukan url, biar bisa slug atau path
    'route'     => 'nullable|string',
    'order'     => 'nullable|integer',
    'parent_id' => 'nullable|exists:menus,id',
    'is_active' => 'boolean',
]);

        $menu->update($request->all());

        return redirect()->route('menus.index')->with('success', 'Menu berhasil diupdate.');
    }
}
