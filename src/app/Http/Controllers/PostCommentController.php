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
        $comment = new Comment([
            'content' => $request->input('content'),
            'user_id' => auth()->id(),
        ]);

        $post->comments()->save($comment);

        return redirect()->back()->with('success', 'Comment added successfully');
    }

    /**
     * Delete Comment
     */
    public function delete(Comment $comment)
    {
        $this->commentService->deleteComment($comment);
        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
}
