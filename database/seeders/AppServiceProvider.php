<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Menu;
use Illuminate\Support\Facades\View;

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
   public function boot()
{
    View::composer('layouts.partials.header', function ($view) {
        $menus = Menu::with('page', 'children.page')
            ->where('is_active', 1)
            ->orderBy('order')
            ->get();

        $view->with('menus', $menus);
    });
}
}
