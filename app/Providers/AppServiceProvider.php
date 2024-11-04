<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
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
        View::composer('*', function ($view) {
            $user = Auth::user();
            $brands = Brand::all();
            $categories = Category::all();
            // $products = Product::all();
            $carts = $user ? Cart::where('user_id', $user->id)->get() : collect(); // Lấy cart của người dùng nếu đã đăng nhập
            $totalProductCart = $carts->count();

            $view->with([
                'user' => $user,
                'brands' => $brands,
                'categories' => $categories,
                'carts' => $carts,
                'totalProductCart' => $totalProductCart
                // 'products' => $products
            ]);
        });
    }
}
