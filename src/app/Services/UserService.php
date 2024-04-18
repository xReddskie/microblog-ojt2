<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Str;
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
}
