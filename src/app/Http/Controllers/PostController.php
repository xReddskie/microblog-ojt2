<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Photo;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use App\Services\PostService;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    public $postService;
    public $followController;

    public function __construct()
    {
        $this->postService = new PostService;
        $this->followController = new FollowController;
    }

    /**
     * Create user posts
     */
    public function create(PostRequest $request): RedirectResponse
    {
        $userId = auth()->id();
        $post = $this->postService->create($request, $userId);
        $this->postService->addPhotos($request, $userId, $post);
        return redirect()->back()->with('success', 'Post shared successfully!');
    }

    /**
     * Delete Post
     */
    public function deletePost(Post $post): RedirectResponse
    {
        $this->postService->deletePost($post);
        return redirect()->route('dashboard', ['id' => auth()->user()->id])->with('deleted', 'Post deleted successfully!');
    }

    /**
     * Edit Post
     */
    public function editPost(Post $post, PostRequest $request): RedirectResponse
    {
        return $this->postService->editPost($post, $request) ?  redirect()->route('dashboard', ['id' => auth()->user()->id]) :
            redirect('/')->with('error', 'Unauthorized access');
    }

    /**
     * View to edit Post
     */
    public function viewPost(Post $post): View
    {
        return view('pages.dashboard.edit-post', ['post' => $post]);
    }

    /**
     * Like Post
     */
    public function like(Post $post): RedirectResponse
    {
        $this->postService->like($post);
        return redirect()->back();
    }

    /**
     * Unlike Post
     */
    public function unlike(Post $post): RedirectResponse
    {
        $this->postService->unlike($post);
        return redirect()->back();
    }
    
    /**
     * Show post detail
     */
    public function postDetails(int $id): View
    {
        $user = auth()->user();
        $post = $this->postService->postDetails($id);
        $suggestedUsers = $this->followController->showSuggestions();
        return view('pages.dashboard.post-details', compact('user','post', 'suggestedUsers'));
    }
    
    /**
     * Show post detail
     */
    public function sharePostPage(int $id): View
    {
        $user = auth()->user();
        $post = $this->postService->sharePostPage($id);
        $shares = $this->postService->postDetails($id);
        $suggestedUsers = $this->followController->showSuggestions();
        return view('pages.dashboard.share-page', compact('user','post', 'shares', 'suggestedUsers'));
    }
    
    /**
     * Share user posts
     */
    public function sharePost(PostRequest $request, int $id): RedirectResponse
    {
        $userId = auth()->id();
        $post = $this->postService->sharePost($request, $userId, $id);
        $this->postService->addPhotos($request, $userId, $post);
        return redirect()->route('dashboard', ['id' => auth()->user()->id])->with('success', 'Post shared successfully!');
        
    }
}
