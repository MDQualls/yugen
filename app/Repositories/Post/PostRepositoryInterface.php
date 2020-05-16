<?php
namespace App\Repositories\Post;

interface PostRepositoryInterface
{
    public function getLatestPosts($number);

    public function getAllPostsPaginated($pageSize = 6);

    public function getCategoryPostsPaginated($category, $pageSize = 6);

    public function getAuthorPostsPaginated($user, $pageSize = 6);

    public function getTagPostsPaginated($tag, $pageSize = 6);

    public function getPostWithTitle($title);
}
