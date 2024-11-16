<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterAdminController extends Controller
{
    // Redirect path after registration
    protected $redirectTo = '/admin';

    public function __construct()
    {
        // Chỉ cho phép admin đã đăng nhập truy cập trang này
        $this->middleware('auth:admin');
    }


    /**
     * Show the registration form for the admin
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('admin.auth.register');
    }

    /**
     * Handle the admin registration request
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // Validate the form data
        $this->validator($request->all())->validate();

        // Create a new admin after successful validation
        $admin = $this->create($request->all());

        // Automatically log the admin in after registration
        Auth::guard('admin')->login($admin);

        // Redirect to the intended page or the admin dashboard
        return redirect()->intended($this->redirectTo);
    }

    /**
     * Get a validator for an incoming admin registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:50', 'unique:admins'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new admin instance after a valid registration.
     *
     * @param array $data
     * @return \App\Models\Admin
     */
    protected function create(array $data)
    {
        return Admin::create([
            'username' => $data['username'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
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
}
