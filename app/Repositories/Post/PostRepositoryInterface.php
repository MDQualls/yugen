<?php
namespace App\Repositories\Post;

interface PostRepositoryInterface
{
    public function getLatestPosts();

    public function getAllPostsPaginated();

    public function getCategoryPostsPaginated($categoryId);

    public function getAuthorPostsPaginated($userId);
}
