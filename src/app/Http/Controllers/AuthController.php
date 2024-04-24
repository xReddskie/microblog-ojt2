<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\View\View;
use App\Services\UserService;
use App\Services\PostService;
use App\Services\ProfileService;
use App\Http\Requests\LoginRequest;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\RegisterRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public $userCreate;
    public $profileCreate;
    
    public function __construct()
    {
        $this->userCreate = new UserService;
        $this->profileCreate = new ProfileService;
    }
    
    /**
     * Login User
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        if (auth()->attempt(['email' => $request['email'], 'password' => $request['password']])) {
            $request->session()->regenerate();
        }

        return redirect()->route('dashboard');
    }

    /**
     * Handle user registration.
     */
    public function register(RegisterRequest $request): RedirectResponse
    {
        try {
            $user = $this->userCreate->create($request);
            $this->profileCreate->create($request, $user->id);

            Session::regenerate();
            auth()->login($user);
            event(new Registered($user));

            return redirect('/verify-waiting')->with('success', 'Registration is successful! Please check your email for verification.');
        } catch (\Exception $e) {
            return redirect('/register-page')->with('error', 'Registration failed: ' . $e->getMessage());
        }
    }

    /**
     * Verify user's email.
     */
    public function verifyEmail($id, $hash): RedirectResponse
    {
        $user = User::find($id);

        if (!$user) {
            return redirect('/pages/auth/register')->with('error', 'User not found.');
        }

        if ($hash != sha1($user->getEmailForVerification())) {
            return redirect('/pages/auth/register')->with('error', 'Invalid verification link.');
        }

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }

        $user->status = 1;
        $user->save();

        event(new Verified($user));

        return redirect('/dashboard')->with('verified', true);
    }

    /**
     * Redirect to email verification page.
     */
    public function emailVerifyRedirect(): View
    {
        return view('pages/auth/register');
    }

    /**
     * Resend email verification link.
     */
    public function resendEmailVerification(): RedirectResponse
    {
        $user = auth()->user();
        $user->sendEmailVerificationNotification();
        return redirect()->back()->with('success', 'Email verification link resent.');
    }

    /**
     * Logouts the user.
     */
    public function logout(): RedirectResponse
    {
        auth()->logout();
        Session::invalidate();
        return redirect('/');
    }
}
