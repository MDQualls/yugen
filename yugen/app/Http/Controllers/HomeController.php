<?php

namespace App\Http\Controllers;

use App\Category;
use App\Repositories\Post\PostRepositoryInterface;
use App\User;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    /**
     * @var PostRepositoryInterface
     */
    private $postRepository;

    /**
     * HomeController constructor.
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

        return view('home')
            ->with('posts', $posts)
            ->with('categoryCount', Category::count())
            ->with('userCount', User::count());
    }
}
