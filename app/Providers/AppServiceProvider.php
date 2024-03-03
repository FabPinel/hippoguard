<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Discount;
use App\Models\DIY;
use Illuminate\Support\ServiceProvider;
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
    public function boot(): void
    {
        $products = Product::where('active', true)->get();
        $categories = Category::all();
        $productsHome = Product::paginate(5);
        View::share('products', $products);
        View::share('categories', $categories);
        View::share('productsHome', $productsHome);
    }
}
