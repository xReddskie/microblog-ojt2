<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\FollowService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public $followService;
    public function __construct()
    {
        $this->followService = new FollowService;
    }

    /**
     * Follow user
     */
    public function follow(User $user): RedirectResponse
    {
        $this->followService->follow($user);

        return back();
    }

    /**
     * Unfollow user
     */
    public function unfollow(User $user): RedirectResponse
    {
        $this->followService->unfollow($user);

        return back();
    }
}
