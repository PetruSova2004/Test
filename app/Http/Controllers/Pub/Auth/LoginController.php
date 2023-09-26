<?php

namespace App\Http\Controllers\Pub\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Pub\Auth\Services\LoginService;
use App\Http\Requests\Pub\Auth\LoginRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LoginController extends Controller
{

    private LoginService $service;

    public function __construct(LoginService $service)
    {
        $this->service = $service;
    }

    public function index(): View
    {
        return view('Pub.Auth.login');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        try {
            $request->validated();
            if ($this->service->login($request)) {
                return redirect()->route('home')->with('success', 'You have successfully log in');
            } else {
                return redirect()->back()->with('error', 'Your credentials are invalid');
            }
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

}
