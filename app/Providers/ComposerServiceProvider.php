<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Brand;
use App\Models\Basket;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
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
        View::composer('layout.part.roots', function($view) {
            $view->with(['items' => Category::all()]);
        });
//        View::composer('layout.part.roots', function($view) {
//            $view->with(['items' => Category::hierarchy()]);
//        });
//        View::composer('layout.part.roots', function($view) {
//            $view->with(['items' => Category::roots()]);
//        });
        View::composer('layout.part.brands', function($view) {
            $view->with(['items' => Brand::popular()]);
        });
        View::composer('layout.site', function($view) {
            $view->with(['positions' => Basket::getBasket()->products->count()]);
        });

        View::composer('layout.site', function($view) {
            $view->with(['positions' => Basket::getCount()]);
        });
    }
}
