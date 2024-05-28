<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use App\Services\PostService;
use App\Services\ProfileService;
use DateTime;

class ProfileController extends Controller
{
    protected $postService;
    protected $profileService;
    protected $userController;
    public function __construct(ProfileService $profileService, PostService $postService, UserController $userController)
    {
        $this->profileService = $profileService;
        $this->postService = $postService;
        $this->userController = $userController;
    }

    /**
     * Summary of profilePage
     * @return \Illuminate\View\View
     */
    public function profilePage(): View
    {
        $user = auth()->user();
        $posts = $this->postService->viewOwnPosts();
        return view('pages/profile/profile', compact('posts', 'user'));
    }

    /**
     * Summary of editProfile
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
        if (!$user instanceof User) {
            return back()->withErrors(['error' => 'Authentication required.']);
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Incorrect password.']);
        }

        try {
            $this->profileService->updateProfile($user, $request->validated());
            return redirect()->back()->with('status', 'Your profile information has been successfully updated! You will be redirected to the profile page in 5 seconds.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Show posts in the user profile
     */
    public function profileNav(int $id,int $x): View
    {
        $user = User::findOrFail($id);
        $view = $this->userController->show($id);
        $photos = $user->photos;
        $birthdate = new DateTime($user->profile->birth_date);
        $today = new DateTime();
        $age = $today->diff($birthdate)->y;

        return $view->with(compact('x', 'photos', 'age'));
    }
}
