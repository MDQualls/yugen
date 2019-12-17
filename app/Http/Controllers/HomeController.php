<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
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
        $this->postRepository = $postRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $posts = Post::where('archived', '=', 0)->orderBy('published_at', 'desc')->paginate(5);

        return view('home')
            ->with('posts', $posts)
            ->with('categories', Category::orderBy('name', 'asc')->get())
            ->with('fullArticle', false);
    }

    public function blogPost(Post $post)
    {
        return view('post.post')
            ->with('post', $post)
            ->with('categories', Category::orderBy('name', 'asc')->get())
            ->with('title', $post->title)
            ->with('fullArticle', true);
    }

    public function categoryPost(Category $category)
    {
        $posts = Post::where('archived', '=', 0)
            ->where('category_id', '=', $category->id)
            ->orderBy('published_at', 'desc')
            ->paginate(5);

        return view('home')
            ->with('posts', $posts)
            ->with('categories', Category::orderBy('name', 'asc')->get())
            ->with('title', "Category: " . $category->name)
            ->with('fullArticle', false);
    }

    public function authorPost(User $user)
    {
        $posts = Post::where('archived', '=', 0)
            ->where('user_id', '=', $user->id)
            ->orderBy('published_at', 'desc')
            ->paginate(5);

        return view('home')
            ->with('posts', $posts)
            ->with('categories', Category::orderBy('name', 'asc')->get())
            ->with('title', "Posts by: " . $user->name)
            ->with('fullArticle', false);
    }
}
