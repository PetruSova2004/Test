<?php

namespace App\Http\Controllers\Pub\Auth\Services;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pub\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterService extends Controller
{
    public function registerUser(RegisterRequest $request): User
    {
        $user = User::query()->create([
            'login' => $request->input('login'),
            'gender' => $request->input('gender'),
            'birthdate' => $request->input('birthdate'),
            'password' => $request->input('password'),
        ]);
        Auth::attempt([
            'login' => $request->input('login'),
            'password' => $request->input('password'),
        ]);
        return User::find($user->id);
    }
}
