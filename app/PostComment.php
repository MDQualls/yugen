<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'comment', 'user_id', 'post_id', 'parent_comment_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function replyTo()  {
        return $this->belongsTo($this, 'parent_comment_id');
    }

    public function replys()  {
        return $this->hasMany($this, 'parent_comment_id');
    }

}
