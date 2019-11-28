<?php

namespace App\Services\Tag;

use App\Post;
use App\Tag;

class TagService implements TagServiceInterface
{
    /**
     * @param Post $post
     * @param $tagString
     * @return Post
     */
    public function updateTags(Post $post, $tagString): Post
    {
        $tags = explode("#", $tagString);

        if (!is_array($tags)) {
            return $post;
        }

        $result = [];
        foreach ($tags as $tag) {
            $t = trim($tag);
            if ($t == '') {
                continue;
            }

            $existingTag = TAG::where('name', '=', $t)->first();

            if ($existingTag) {
                $result[] = $existingTag->id;
                continue;
            }

            $result[] = Tag::create([
                'name' => $t,
            ])->id;
        }

        $post->tags()->sync($result);
        return $post;
    }
}
