<?php
namespace App\Repositories\Post;

use Illuminate\Support\Collection;
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
}
