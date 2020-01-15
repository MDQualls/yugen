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


    public function delete(PostComment $comment)
    {
        if($comment->parent_comment_id == 0)  {
            $route = route('post-comments');
            $comment->replys()->delete();
        } else {
            $route = route('manage-comment', ['comment' => $comment->parent_comment_id]);
        }

        $comment->delete();

        session()->flash('success', 'Comment deleted successfully');

        return redirect($route);
    }
}
