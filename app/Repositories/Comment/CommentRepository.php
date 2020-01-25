<?php
namespace App\Repositories\Comment;

use App\Http\Requests\Posts\PostCommentRequest;
use App\Http\Requests\Posts\PostReplyRequest;
use App\Http\Requests\Posts\UpdateCommentRequest;
use App\Post;
use App\PostComment;

class CommentRepository implements CommentRepositoryInterface
{
    /**
     * @var PostComment
     */
    private $postComment;

    public function __construct(PostComment $postComment)
    {
        $this->postComment = $postComment;
    }

    /**
     * @param PostCommentRequest|PostReplyRequest $request
     * @param Post $post
     * @return mixed
     */
    public function create($request, $post)
    {
        $text = ($request->comment) ? $request->comment : $request->commentReplyTextarea;

        $comment = $this->postComment::create([
            'comment' => $text,
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'parent_comment_id' => $request->parent_comment_id ?? 0,
        ]);

        return $comment;
    }

    /**
     * @param UpdateCommentRequest $request
     * @return mixed
     */
    public function get(UpdateCommentRequest $request)
    {
        $result = $this->postComment::where('id', '=', $request->comment_id)->first();
        return $result;
    }

}

