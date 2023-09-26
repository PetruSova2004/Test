<?php

namespace App\Http\Controllers\Pub\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::query()->where('id', '!=', Auth::user()->getAuthIdentifier())->get();
        return view('Pub.User.index', compact('users'));
    }

    public function destroy(string $id): RedirectResponse
    {
        User::query()->where('id', $id)->delete();
        return redirect()->route('home')->with('success', 'User has been successfully deleted');
    }

}
