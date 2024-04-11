<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function register(RegisterRequest $request)
    {
        try {
            $user = User::create([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'email' => $request->email,
                'status' => 0,
                'remember_token' => Str::random(40),
            ]);

            Profile::create([
                'user_id' => $user->id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'middle_name' => $request->middle_name,
                'birth_date' => $request->birthday,
                'address' => implode(', ', array_filter([
                    $request->lot_block,
                    $request->street,
                    $request->city,
                    $request->province,
                    $request->country,
                    $request->zip_code,
                ])),
            ]);

            auth()->login($user);
            event(new Registered($user));

            return redirect('/register')->with('success', 'Registration is successful! Please check your email for verification.');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function verifyEmail(Request $request, $id, $hash)
    {
        if (
            $id == auth()->id() &&
            auth()->user()->markEmailAsVerified()
        ) {
            event(new Verified($request->user()));
        }

        return redirect('/register')->with('verified', true);
    }

    public function verifyWaiting()
    {

        if (auth()->check()) {
            if (auth()->check() && auth()->user()->email_verified_at) {
                auth()->user()->status = 1;
                auth()->user()->save();
                return view('register');
            }
        }
        return view('register');
    }
}
