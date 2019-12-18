<?php
namespace App\Repositories\Post;

interface PostRepositoryInterface
{
    public function getLatestPosts();

    public function getAllPostsPaginated();

    public function getCategoryPostsPaginated($category);

    public function getAuthorPostsPaginated($user);

    public function getPostWithTitle($title);
}
