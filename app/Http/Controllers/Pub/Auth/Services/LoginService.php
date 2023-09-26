<?php

namespace App\Http\Controllers\Pub\Auth\Services;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pub\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginService extends Controller
{
    public function login(LoginRequest $request): bool
    {
        if (Auth::attempt([
            'login' => $request->input('login'),
            'password' => $request->input('password'),
        ])) {
            return true;
        } else {
            return false;
        }
    }
}
