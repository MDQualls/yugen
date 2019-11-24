<?php
namespace App\Repositories\Post;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class PostRepository implements PostRepositoryInterface
{

    /**
     * @return Collection
     */
    public function getLatestPosts()
    {
        $posts = DB::table('posts')
            ->orderBy('published_at', 'desc')
            ->limit(10)
            ->get();

        return $posts;
    }
}
