<?php
namespace App\Repositories\Post;

use App\Post;
use Illuminate\Database\Eloquent\Builder;

class PostRepository implements PostRepositoryInterface
{
    /**
     * @var Post
     */
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * @return mixed
     */
    public function getLatestPosts()
    {
        $posts = $this->post::all()
            ->where('archived', '=', 0)
            ->sortByDesc('published_at')
            ->take(10);

        return $posts;
    }

    /**
     * @return mixed
     */
    public function getAllPostsPaginated()
    {
        return $this->post::where('archived', '=', 0)->orderBy('published_at', 'desc')->paginate(5);
    }

    /**
     * @param $category
     * @return mixed
     */
    public function getCategoryPostsPaginated($category)
    {
        return $this->post::whereHas('category', function (Builder $query) use ($category) {
            $query->where('name', '=', $category);
            })->where('archived', '=', 0)->orderBy('published_at', 'desc')->paginate(5);
    }

    /**
     * @param $user
     * @return mixed
     */
    public function getAuthorPostsPaginated($user)
    {
        return $this->post::whereHas('user', function (Builder $query) use ($user) {
            $query->where('name', '=', $user);
        })->where('archived', '=', 0)->orderBy('published_at', 'desc')->paginate(5);
    }

    public function getPostWithTitle($title)
    {
        return $this->post::where('title','=',$title)->first();
    }

    public function getTagPostsPaginated($tag)
    {
        return $this->post::whereHas('tags', function (Builder $query) use ($tag) {
            $query->where('name', '=', $tag);
        })->where('archived', '=', 0)->orderBy('published_at', 'desc')->paginate(5);
    }
}
