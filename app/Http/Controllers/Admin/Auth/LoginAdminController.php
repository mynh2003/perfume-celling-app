<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginAdminController extends Controller
{
    // Redirect path after login
    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('auth:admin')->only('logout');
    }

    /**
     * Show the login form for the admin
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * Handle the login request for the admin
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validate the form data
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt to login the admin with the given credentials
        if (Auth::guard('admin')->attempt([
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ], $request->filled('remember'))) {
            // If successful, redirect to the admin dashboard
            return redirect()->intended($this->redirectTo);
        }

        // If login attempt fails, redirect back with an error message
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Logout method for admin
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    /**
     * Specify the guard to use for Admin authentication
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    protected function guard()
    {
        return auth()->guard('admin');
    }

    /**
     * Override the username method to use `username` instead of `email`.
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }
}

