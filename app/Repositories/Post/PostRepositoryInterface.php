<?php
namespace App\Repositories\Post;

interface PostRepositoryInterface
{
    public function getLatestPosts($number);

    public function getAllPostsPaginated();

    public function getCategoryPostsPaginated($category);

    public function getAuthorPostsPaginated($user);

    public function getTagPostsPaginated($tag);

    public function getPostWithTitle($title);
}
