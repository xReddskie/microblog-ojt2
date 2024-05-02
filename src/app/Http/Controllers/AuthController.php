<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Notifications\PasswordReset;
use App\Services\UserService;
use App\Services\ProfileService;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

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
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid Credentials',
        ])->onlyInput('email');
    }

    /**
     * Show the login form.
     */
    public function showLoginForm(): View
    {
        return view('/pages/auth/login');
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
        return view('pages/auth/dummy-verify-wait');
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
     * Display the form for requesting a password reset link.
     */
    public function showForgotPasswordForm(): View
    {
        return view('/pages/auth/forgot-password');
    }

    /**
     * Handle the submission of the form to send a password reset link.
     */
    public function submitForgotPasswordForm(ForgotPasswordRequest $request): RedirectResponse
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        $user = User::where('email', $request->email)->first();

        $user->notify(new PasswordReset($token, $request->email));

        return redirect()->back()->with('status', 'We have emailed your password reset link!');
    }

    /**
     * Display the password reset form.
     */
    public function showResetPasswordForm($token): View
    {
        return view('/pages/auth/reset-password', ['token' => $token]);
    }

    /**
     * Handle the password reset submission.
     */
    public function submitResetPasswordForm(ResetPasswordRequest $request): RedirectResponse
    {
        $request->validate([
            'token' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $passwordReset = DB::table('password_resets')->where('token', $request->token)->first();

        if (!$passwordReset) {
            return redirect()->back()->withErrors(['token' => 'This password reset token is invalid.']);
        }

        $user = User::where('email', $passwordReset->email)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'No user found for this email address.']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        DB::table('password_resets')->where('token', $request->token)->delete();

        return redirect()->back()->with('status', 'Your password has been successfully reset. You will be redirected to the login page in 5 seconds.');
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
