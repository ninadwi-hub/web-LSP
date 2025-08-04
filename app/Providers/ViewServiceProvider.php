<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Menu;
use App\Models\Page;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            // Ambil menu utama
            $menus = Menu::whereNull('parent_id')
                ->where('is_active', true)
                ->orderBy('order')
                ->with(['children' => function ($q) {
                    $q->where('is_active', true)->orderBy('order');
                }])
                ->get();

            // Ambil halaman featured (untuk beranda)
            $featuredPages = Page::where('status', 'published')
                ->where('is_featured', true)
                ->latest('published_at')
                ->take(6)
                ->get();

            // Ambil semua halaman yang dipublish dan kelompokkan per kategori
            $pagesByCategory = Page::where('status', 'published')
                ->get()
                ->groupBy('category');

            $view->with([
                'menus' => $menus,
                'featuredPages' => $featuredPages,
                'pagesByCategory' => $pagesByCategory,
            ]);
        });
    }
}
