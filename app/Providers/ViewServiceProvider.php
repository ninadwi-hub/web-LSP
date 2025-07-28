<?php

namespace App\Providers;
use App\Models\Page;
use Illuminate\Support\ServiceProvider;

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

view()->composer('*', function ($view) {
        $profilPages = Page::where('category', 'profil')->where('status', 'published')->get();
        $informasiPages = Page::where('category', 'informasi')->where('status', 'published')->get();

        $view->with(compact('profilPages', 'informasiPages'));
    });

        //
    }
}
