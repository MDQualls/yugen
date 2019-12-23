<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\PostCommentRequest;
use App\Post;
use App\PostComment;
use Illuminate\Http\RedirectResponse;

class PostCommentController extends Controller
{
    /**
     * @param PostCommentRequest $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function postComment(PostCommentRequest $request, Post $post)
    {
        $comment = PostComment::create([
            'comment' => $request->comment,
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'parent_comment_id' => $request->parent_comment_id ?? 0,
        ]);

        return redirect()->route('blog-post', ['title' => $post->title]);
    }
}
