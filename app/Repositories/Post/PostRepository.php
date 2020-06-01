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
    public function getLatestPosts($number)
    {
        $posts = $this->post::all()
            ->where('archived', '=', 0)
            ->sortByDesc('published_at')
            ->take($number);

        return $posts;
    }

    /**
     * @param int $pageSize
     * @return mixed
     */
    public function getAllPostsPaginated($pageSize = 6)
    {
        return $this->post::where('archived', '=', 0)->orderBy('published_at', 'desc')->simplePaginate($pageSize);
    }

    /**
     * @param $category
     * @param int $pageSize
     * @return mixed
     */
    public function getCategoryPostsPaginated($category, $pageSize = 6)
    {
        return $this->post::whereHas('category', function (Builder $query) use ($category) {
            $query->where('name', '=', $category);
            })->where('archived', '=', 0)->orderBy('published_at', 'desc')->paginate($pageSize);
    }

    /**
     * @param $user
     * @param int $pageSize
     * @return mixed
     */
    public function getAuthorPostsPaginated($user, $pageSize = 6)
    {
        return $this->post::whereHas('user', function (Builder $query) use ($user) {
            $query->where('name', '=', $user);
        })->where('archived', '=', 0)->orderBy('published_at', 'desc')->paginate($pageSize);
    }

    /**
     * @param $title
     * @return mixed
     */
    public function getPostWithTitle($title)
    {
        return $this->post::where('title','=',$title)->first();
    }

    /**
     * @param $tag
     * @param int $pageSize
     * @return mixed
     */
    public function getTagPostsPaginated($tag, $pageSize = 6)
    {
        return $this->post::whereHas('tags', function (Builder $query) use ($tag) {
            $query->where('name', '=', $tag);
        })->where('archived', '=', 0)->orderBy('published_at', 'desc')->paginate($pageSize);
    }
}
