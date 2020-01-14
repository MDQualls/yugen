<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\PostComment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = PostComment::where('parent_comment_id','=',0)->paginate(10);

        return view('admin.comment.index')
            ->with('title', 'Comment Admin')
            ->with('comments', $comments);
    }

    public function manage(PostComment $comment)
    {
        return view('admin.comment.manage')
            ->with('title', 'Manage Comment')
            ->with('comment', $comment);
    }
}
