<?php

namespace App\Services;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Notifications\PasswordReset;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class UserService
{
    /**
     * Create User
     */
    public function create(RegisterRequest $request): User
    {
        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'status' => 0,
            'remember_token' => Str::random(40),
        ]);
        return $user;
    }

    /**
     * Initializes Password Reset Link Submission
     */

    public function initiatePasswordReset($email): void
    {
        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        $user = User::where('email', $email)->first();

        if (!$user) {
            throw new \Exception('No user found for this email address.');
        }

        $user->notify(new PasswordReset($token, $email));
    }

    /**
     * Resets the User's Password
     */

    public function resetPassword($token, $newPassword): User
    {
        $passwordReset = DB::table('password_resets')->where('token', $token)->first();

        if (!$passwordReset) {
            throw new \Exception('This password reset token is invalid.');
        }

        $user = User::where('email', $passwordReset->email)->first();

        if (!$user) {
            throw new \Exception('No user found for this email address.');
        }

        DB::transaction(function () use ($user, $newPassword, $token) {
            $user->password = Hash::make($newPassword);
            $user->save();
            DB::table('password_resets')->where('token', $token)->delete();
        });

        return $user;
    }

    /**
     * Get User Profile
     */

    public function getUserProfile(int $id): array
    {
        $user = User::with('profile')->findOrFail($id);
        $posts = Post::where('user_id', $user->id)->get();

        return compact('user', 'posts');
    }

    public function getQuery($request, int $id)
    {
        $query = $request->input('query');
        $results = User::where('username', 'like', "%$query%")->get();
        $user = User::with('profile')->findOrFail($id);
        
        return compact('results', 'user', 'request');
    }
}
