<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Services\CommentService;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\RedirectResponse;

class PostCommentController extends Controller
{
    public $commentService;

    public function __construct()
    {
        $this->commentService = new CommentService;
    }

    /**
     * Add Comment
     */
    public function store(CommentRequest $request, Post $post): RedirectResponse
    {
        $this->commentService->create($request, auth()->id(), $post);
    
        return redirect()->back()->with('success', 'Comment added successfully');
    }

    /**
     * Delete Comment
     */
    public function delete(Comment $comment): RedirectResponse
    {
        $this->commentService->deleteComment($comment);
        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
}
