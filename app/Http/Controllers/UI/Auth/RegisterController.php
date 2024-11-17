<?php

namespace App\Http\Controllers\UI\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:50', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:10'],
            'city' => ['required', 'string', 'max:30'],
            'district' => ['required', 'string', 'max:30'],
            'ward' => ['required', 'string', 'max:30'],
            'address' => ['required', 'string', 'max:100'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'city' => $data['city'],
            'district' => $data['district'],
            'ward' => $data['ward'],
            'address' => $data['address'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
