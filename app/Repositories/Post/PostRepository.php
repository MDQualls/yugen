<?php
namespace App\Repositories\Post;

use App\Post;
use Illuminate\Database\Eloquent\Builder;

class PostRepository implements PostRepositoryInterface
{

    /**
     * @return mixed
     */
    public function getLatestPosts()
    {
        $posts = Post::all()
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
        return Post::where('archived', '=', 0)->orderBy('published_at', 'desc')->paginate(5);
    }

    /**
     * @param $category
     * @return mixed
     */
    public function getCategoryPostsPaginated($category)
    {
        return Post::whereHas('category', function (Builder $query) use ($category) {
            $query->where('name', '=', $category);
            })->where('archived', '=', 0)->orderBy('published_at', 'desc')->paginate(5);
    }

    /**
     * @param $user
     * @return mixed
     */
    public function getAuthorPostsPaginated($user)
    {
        return Post::whereHas('user', function (Builder $query) use ($user) {
            $query->where('name', '=', $user);
        })->where('archived', '=', 0)->orderBy('published_at', 'desc')->paginate(5);
    }

    public function getPostWithTitle($title)
    {
        return Post::where('title','=',$title)->first();
    }

    public function getTagPostsPaginated($tag)
    {
        return Post::whereHas('tags', function (Builder $query) use ($tag) {
            $query->where('name', '=', $tag);
        })->where('archived', '=', 0)->orderBy('published_at', 'desc')->paginate(5);
    }
}
