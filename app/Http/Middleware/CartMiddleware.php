<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CartMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $cartItems = session()->get('cart', []);
        $totalQuantity = count($cartItems);

        // Chia sẻ biến với tất cả view
        view()->share('totalQuantity', $totalQuantity);

        return $next($request);
    }
}
