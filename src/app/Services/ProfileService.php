<?php

namespace App\Services;

use App\Http\Requests\RegisterRequest;
use App\Models\Profile;

class ProfileService
{
    /**
     * Create Profile
     */
    public function create(RegisterRequest $request, $userId): void
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
            'phone_number' => $request->phone_number,
        ]);
    }
}
