<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

    /**
     * Show other user's profile
     */

    public function show(int $id): View
    {
        $data = $this->userService->getUserProfile($id);
        return view('pages.profile.profile', $data);
    }

    public function search(Request $request, int $id)
    {
        $query = $request->input('query');
        $results = User::where('username', 'like', "%$query%")->get();
        $user = User::with('profile')->findOrFail($id);
        return view('pages.dashboard.search-result', compact('results', 'user', 'request'));
    }
}
