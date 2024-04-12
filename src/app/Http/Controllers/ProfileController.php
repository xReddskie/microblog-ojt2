<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class ProfileController extends Controller
{
    public function createProfile($request, $userId)
    {
        Profile::create([
            'user_id' => $userId,
            'first_name' => ucwords($request->first_name),
            'last_name' => ucwords($request->last_name),
            'middle_name' => ucwords($request->middle_name),
            'birth_date' => ucwords($request->birthday),
            'address' => implode(', ', array_filter([
                $request->lot_block,
                $request->street,
                $request->city,
                $request->province,
                ucwords($request->country),
                $request->zip_code,
            ])),
        ]);
    }
}
