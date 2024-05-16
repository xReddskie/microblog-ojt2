<?php

namespace App\Services;

use App\Http\Requests\RegisterRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Exception;

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
            'bio' => $request->bio, 
        ]);
    }

    /**
     * Update Profile
     */
    public function updateProfile(User $user, array $data): void
    {
        $path = null;
        if (isset($data['images'])) {
        foreach ($data['images'] as $image) {
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/post_images', $filename);
            }
        }
        $updatedData = $data;
        if ($path !== null) {
            $updatedData['images'] = $path;
        }
        $user->profile->update($updatedData);
    }
}
