<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\PostComment;
use App\Repositories\Post\PostRepositoryInterface;
use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * @var PostRepositoryInterface
     */
    private $postRepository;

    /**
     * Dashboard constructor.
     * @param PostRepositoryInterface $postRepository
     */
    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->middleware('auth');
        $this->postRepository = $postRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $posts = $this->postRepository->getLatestPosts();

        $comments = PostComment::where('parent_comment_id', '=', 0)->count();

        return view('admin.dashboard')
            ->with('posts', $posts)
            ->with('categoryCount', Category::count())
            ->with('userCount', User::count())
            ->with('commentCount', $comments);
    }
}
