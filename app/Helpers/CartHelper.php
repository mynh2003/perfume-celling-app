<?php

namespace App\Helpers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartHelper
{
    // public static function getTotalQuantity(Request $request)
    // {
    //     // Get user ID from session or authenticated user
    //     $userId = $request->session()->get('user_id') ?? Auth::id();

    //     if (!$userId) {
    //         $userId = uniqid();
    //         $request->session()->put('user_id', $userId);
    //     }

    //     // Directly count the cart items for the specific user
    //     $totalQuantity = Cart::where('user_id', $userId)->count();
        
    //     return $totalQuantity;
    // }
}
