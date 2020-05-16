<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Repositories\Post\PostRepositoryInterface;
use App\User;
use Illuminate\Contracts\Foundation\Application;
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
        $posts = $this->postRepository->getLatestPosts(6);

        return view('home')
            ->with('title', 'Yugen Farm Blog Posts')
            ->with('posts', $posts)
            ->with('categories', Category::orderBy('name', 'asc')->get());
    }

    /**
     * @return Application|Factory|View
     */
    public function blog()
    {
        $posts = $this->postRepository->getAllPostsPaginated(9);
        return view('blog')
            ->with('title', 'All the news from the farm.')
            ->with('summary', 'We hope that you are able to find something interesting that might
                        help you on your own sustainable journey.')
            ->with('posts', $posts)
            ->with('categories', Category::orderBy('name', 'asc')->get());
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
            ->with('title', $post->title);
    }

    /**
     * @param string $category
     * @return Factory|View
     */
    public function categoryPost($category)
    {
        $posts = $this->postRepository->getCategoryPostsPaginated($category, 9);

        return view('blog')
            ->with('title', sprintf('News for the category: %s', $category))
            ->with('summary', sprintf('All of our blog posts categorized as: %s
                We hope you find the posts in the category interesting and informative!', $category))
            ->with('posts', $posts)
            ->with('categories', Category::orderBy('name', 'asc')->get());
    }

    /**
     * @param string $user
     * @return Factory|View
     */
    public function authorPost($user)
    {
        $posts = $this->postRepository->getAuthorPostsPaginated($user, 9);

        return view('blog')
            ->with('title', sprintf('Posts authored by : %s', $user))
            ->with('summary', sprintf('Here are all the posts that %s has written.
                We hope you find the posts in the category interesting and informative!', $user))
            ->with('posts', $posts)
            ->with('categories', Category::orderBy('name', 'asc')->get());
    }

    /**
     * @param $tag
     * @return Factory|View
     */
    public function tagPost($tag)
    {
        $posts = $this->postRepository->getTagPostsPaginated($tag, 9);

        return view('blog')
            ->with('title', sprintf('Posts tagged with: %s', $tag))
            ->with('summary', sprintf('Here are all the posts that have been tagged %s.
                We hope you find the posts in the category interesting and informative!', $tag))
            ->with('posts', $posts)
            ->with('categories', Category::orderBy('name', 'asc')->get());
    }
}
