<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Services\UserService;
use Illuminate\View\View;

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

    /**
     * Show search results
     */
    public function search(SearchRequest $request, int $id): View
    {
        $data = $this->userService->getQuery($request, $id);
        return view('pages.dashboard.search-result', $data);
    }
}
