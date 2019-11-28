<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'summary',
        'post_content',
        'published_at',
        'category_id',
        'user_id',
        'archived',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * @param Post $post
     * @return string
     */
    public function getTagsAsString(): string
    {
        $tags = $this->tags;

        $result = "";
        foreach ($tags as $tag) {
            $result .= "#$tag->name ";
        }

        return $result;
    }
}
