<?php
namespace App\Services\Tag;

use App\Post;

interface TagServiceInterface
{
    public function updateTags(Post $post, $tagString) : Post;
}
