<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Services\PostService;
use App\Models\Post;

class PostController extends Controller
{
    public $postCreate;
    
    public function __construct()
    {
        $this->postCreate = new PostService;
    }
    
    /**
     * Create user posts
     */
    public function create(PostRequest $request): RedirectResponse
    {
        $userId = auth()->id(); 
        $posts = $this->postCreate->create($request, $userId);
        
        return redirect('/');
    }
}
