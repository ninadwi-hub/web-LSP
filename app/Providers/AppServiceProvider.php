<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Page;

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
        $categories = ['profil', 'sertifikasi', 'media', 'informasi'];

        $pagesByCategory = [];

        foreach ($categories as $category) {
            $pagesByCategory[$category] = Page::where('category', $category)
                ->where('status', 'published')
                ->orderBy('title')
                ->get();
        }

        $view->with('pagesByCategory', $pagesByCategory);
    });
}


}
