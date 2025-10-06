<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
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
    public function boot(): void
    {
        // Pakai Bootstrap 5 untuk pagination
        Paginator::useBootstrapFive();

        // Kirim data pagesByCategory ke semua view
        View::composer('*', function ($view) {
            $categories = ['home', 'profil', 'sertifikasi', 'media', 'informasi', 'kontak'];

            $pagesByCategory = [];

            foreach ($categories as $category) {
                $pagesByCategory[$category] = Page::where('category', $category)
                    ->where('status', 'published')
                    ->orderBy('title')
                    ->get();
            }

            $view->with('pagesByCategory', $pagesByCategory);
        });

        // Kirim data skema ke layouts.website
        View::composer('layouts.website', function ($view) {
            $view->with('menuSkema', Skema::orderBy('nama')->get());
        });
    }
}
