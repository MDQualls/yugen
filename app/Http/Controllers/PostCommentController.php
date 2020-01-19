<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\PostCommentRequest;
use App\Http\Requests\Posts\PostReplyRequest;
use App\Http\Requests\Posts\UpdateCommentRequest;
use App\Mail\ResponseAlert;
use App\Post;
use App\PostComment;
use App\Services\Notification\ResponseAlertInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class PostCommentController extends Controller
{
    /**
     * @var ResponseAlertInterface
     */
    protected $responseAlertService;

    /**
     * PostCommentController constructor.
     * @param ResponseAlertInterface $responseAlertService
     */
    public function __construct(ResponseAlertInterface $responseAlertService)
    {
        $this->responseAlertService = $responseAlertService;
    }

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

        $this->responseAlertService->sendAlerts($comment, $url);

        return redirect()->route('blog-post', ['title' => $post->title]);
    }

    /**
     * @param PostReplyRequest $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function postReply(PostReplyRequest $request, Post $post)
    {
        $title = rawurlencode($post->title);
        $url = url("/article/{$title}");

        if(preg_match('/\w+/',$request->commentReplyTextarea))  {
            $comment = PostComment::create([
                'comment' => $request->commentReplyTextarea,
                'user_id' => auth()->user()->id,
                'post_id' => $post->id,
                'parent_comment_id' => $request->parent_comment_id ?? 0,
            ]);

            $this->responseAlertService->sendAlerts($comment, $url);
        }

        return redirect()->route('blog-post', ['title' => $post->title]);
    }

    /**
     * @param UpdateCommentRequest $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function updateComment(UpdateCommentRequest $request, Post $post)  {

        if(preg_match('/\w+/',$request->editCommentTextarea))  {

            $comment = PostComment::where('id', '=', $request->comment_id)->first();

            if($comment) {
                $comment->comment = $request->editCommentTextarea;
                $comment->update();
            }
        }

        return redirect()->route('blog-post', ['title' => $post->title]);
    }
}
