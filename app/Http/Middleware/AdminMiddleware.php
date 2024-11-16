<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        Log::info('AdminMiddleware được gọi.');

        // Kiểm tra người dùng đã đăng nhập chưa
        if (!Auth::guard('admin')->check()) {
            Log::warning('Người dùng chưa đăng nhập với guard admin.');
            return redirect()->route('admin.login')->with('error', 'You must log in as an admin.');
        }

        return $next($request);
    }
}
