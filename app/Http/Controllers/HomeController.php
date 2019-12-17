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
     * @param Post $post
     * @return Factory|View
     */
    public function blogPost(Post $post)
    {
        return view('post.post')
            ->with('post', $post)
            ->with('categories', Category::orderBy('name', 'asc')->get())
            ->with('title', $post->title)
            ->with('fullArticle', true);
    }

    /**
     * @param Category $category
     * @return Factory|View
     */
    public function categoryPost(Category $category)
    {
        $posts = $this->postRepository->getCategoryPostsPaginated($category->id);

        return view('home')
            ->with('posts', $posts)
            ->with('categories', Category::orderBy('name', 'asc')->get())
            ->with('title', "Category: " . $category->name)
            ->with('fullArticle', false);
    }

    /**
     * @param User $user
     * @return Factory|View
     */
    public function authorPost(User $user)
    {
        $posts = $this->postRepository->getAuthorPostsPaginated($user->id);

        return view('home')
            ->with('posts', $posts)
            ->with('categories', Category::orderBy('name', 'asc')->get())
            ->with('title', "Posts by: " . $user->name)
            ->with('fullArticle', false);
    }
}
