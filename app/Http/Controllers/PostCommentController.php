<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\PostCommentRequest;
use App\Http\Requests\Posts\PostReplyRequest;
use App\Http\Requests\Posts\UpdateCommentRequest;
use App\Post;
use App\PostComment;
use App\Repositories\Comment\CommentRepository;
use App\Services\Notification\ResponseAlertInterface;
use Illuminate\Http\RedirectResponse;

class PostCommentController extends Controller
{
    /**
     * @var ResponseAlertInterface
     */
    protected $responseAlertService;

    /**
     * @var CommentRepository
     */
    protected $commentRepository;

    /**
     * PostCommentController constructor.
     * @param ResponseAlertInterface $responseAlertService
     * @param CommentRepository $commentRepository
     */
    public function __construct(
        ResponseAlertInterface $responseAlertService,
        CommentRepository $commentRepository
    ){
        $this->responseAlertService = $responseAlertService;
        $this->commentRepository = $commentRepository;
    }

    /**
     * @param PostCommentRequest $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function postComment(PostCommentRequest $request, Post $post)
    {
        $comment = $this->commentRepository->create($request, $post);

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

            $comment = $this->commentRepository->create($request, $post);

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

            $comment = $this->commentRepository->get($request);

            if($comment) {
                $comment->comment = $request->editCommentTextarea;
                $comment->update();
            }
        }

        return redirect()->route('blog-post', ['title' => $post->title]);
    }
}
