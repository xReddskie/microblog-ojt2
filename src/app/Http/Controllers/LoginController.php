<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->hasVerifiedEmail()) {
            return redirect()->intended($this->redirectPath());
        }

        Auth::logout();
        return redirect('/login')->with('warning', 'You need to verify your email address.');
    }
    protected function redirectPath()
    {
        return '/'; // Default path to redirect after login
    }
}