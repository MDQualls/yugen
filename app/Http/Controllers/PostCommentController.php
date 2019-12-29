<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\PostCommentRequest;
use App\Mail\ResponseAlert;
use App\Post;
use App\PostComment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

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

        $title = rawurlencode($post->title);
        $url = url("/article/{$title}");

        Mail::to($comment->user)->send(new ResponseAlert($comment, $url));

        return redirect()->route('blog-post', ['title' => $post->title]);
    }
}
