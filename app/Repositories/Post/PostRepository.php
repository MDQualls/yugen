<?php
namespace App\Repositories\Post;

use App\Post;

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
     * @param $categoryId
     * @return mixed
     */
    public function getCategoryPostsPaginated($categoryId)
    {
        return Post::where('archived', '=', 0)
            ->where('category_id', '=', $categoryId)
            ->orderBy('published_at', 'desc')
            ->paginate(5);
    }

    /**
     * @param $userId
     * @return mixed
     */
    public function getAuthorPostsPaginated($userId)
    {
        return Post::where('archived', '=', 0)
            ->where('user_id', '=', $userId)
            ->orderBy('published_at', 'desc')
            ->paginate(5);
    }
}
