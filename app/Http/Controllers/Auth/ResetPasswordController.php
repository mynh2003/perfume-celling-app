<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = '/home';

    /**
     * Override the reset method to perform additional actions after password reset
     */
    
}
