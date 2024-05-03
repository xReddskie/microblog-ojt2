<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use App\Services\PostService;
use App\Services\ProfileService;

class ProfileController extends Controller
{
    protected $postService;
    protected $profileService;
    public function __construct(ProfileService $profileService, PostService $postService)
    {
        $this->profileService = $profileService;
        $this->postService = $postService;
    }

    /**
     * Summary of profilePage
     * @return \Illuminate\View\View
     */

    public function profilePage(): View
    {
        $posts = $this->postService->viewOwnPosts();
        return view('pages/profile/profile', compact('posts'));
    }

    /**
     * Summary of editProfile
     * @return \Illuminate\View\View
     */

    public function editProfile(): View
    {
        $user = auth()->user();
        return view('pages.profile.edit-profile', compact('user'));
    }



    /**
     * Summary of updateProfile
     */

    public function updateProfile(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = auth()->user();
        if (!$user) {
            return back()->withErrors(['error' => 'Authenticated user is not a valid user.']);
        }

        // Check if the provided password matches the stored password
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Incorrect password.']);
        }

        try {
            $this->profileService->updateProfile($user, $request->validated());
            return redirect()->route('profile-page')->with('status', 'Profile updated successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}
