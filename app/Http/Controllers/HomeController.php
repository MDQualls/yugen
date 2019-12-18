<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Repositories\Post\PostRepositoryInterface;
use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

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
        $this->postRepository = $postRepository;
    }

    /**
     * Show the application home page.
     *
     * @return Renderable
     */
    public function index()
    {
        $posts = $this->postRepository->getAllPostsPaginated();

        return view('home')
            ->with('posts', $posts)
            ->with('categories', Category::orderBy('name', 'asc')->get())
            ->with('fullArticle', false);
    }

    /**
     * @param string $title
     * @return Factory|View
     */
    public function blogPost($title)
    {
        $post = $this->postRepository->getPostWithTitle($title);

        return view('post.post')
            ->with('post', $post)
            ->with('categories', Category::orderBy('name', 'asc')->get())
            ->with('title', $post->title)
            ->with('fullArticle', true);
    }

    /**
     * @param string $category
     * @return Factory|View
     */
    public function categoryPost($category)
    {
        $posts = $this->postRepository->getCategoryPostsPaginated($category);

        return view('home')
            ->with('posts', $posts)
            ->with('categories', Category::orderBy('name', 'asc')->get())
            ->with('title', "Category: " . $category)
            ->with('fullArticle', false);
    }

    /**
     * @param string $user
     * @return Factory|View
     */
    public function authorPost($user)
    {
        $posts = $this->postRepository->getAuthorPostsPaginated($user);

        return view('home')
            ->with('posts', $posts)
            ->with('categories', Category::orderBy('name', 'asc')->get())
            ->with('title', "Posts by: " . $user)
            ->with('fullArticle', false);
    }
}
