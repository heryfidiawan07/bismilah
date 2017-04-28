<?php

namespace App\Providers;

use View;
use App\Area;
use App\Brand;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $brands = Brand::orderBy('brand')->get();
        $areas  = Area::orderBy('area')->get();
        View::share(['brands' => $brands, 'areas' => $areas]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
