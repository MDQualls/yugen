<?php
namespace App\Repositories\Comment;


use App\Http\Requests\Posts\UpdateCommentRequest;

interface CommentRepositoryInterface
{
    public function create($request, $post);
    public function get(UpdateCommentRequest $request);
}
