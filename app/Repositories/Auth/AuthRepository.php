<?php

namespace App\Repositories\Auth;

use Illuminate\Support\Facades\Auth;

class AuthRepository
{
    public function __construct()
    {

    }

    public function login($credentials , $guard , $remember_me = false)
    {
        return Auth::guard($guard)->attempt($credentials, $remember_me);
    }

    public function logout($guard)
    {
        return Auth::guard($guard)->logout();
    }
}
