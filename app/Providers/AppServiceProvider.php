<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\admin\Menu;

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
        $menu = Menu::where('status', 1)->get();
        view()->share('menu', $menu);
    }

}
