<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Page;
use App\Models\Skema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    // app/Providers/AppServiceProvider.php

public function boot()
{
    View::composer('*', function ($view) {
        $categories = ['home','profil', 'sertifikasi', 'media', 'informasi','kontak'];

        $pagesByCategory = [];

        foreach ($categories as $category) {
            $pagesByCategory[$category] = Page::where('category', $category)
                ->where('status', 'published')
                ->orderBy('title')
                ->get();
        }

        $view->with('pagesByCategory', $pagesByCategory);
    });
{
    // Kirim data skema ke semua view
    view()->composer('layouts.website', function ($view) {
        $view->with('menuSkema', Skema::orderBy('nama')->get());
    });
}
}


}
