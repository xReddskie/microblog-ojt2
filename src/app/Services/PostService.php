<?php

namespace App\Services; 

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostService
{
    /**
     * Create post function
     */
    public function create(PostRequest $request, $userId): Post
    {
         $posts = Post::create([
            'user_id' =>$userId,
            'content' =>$request->content,
        ]);

        return $posts;
    }
}
