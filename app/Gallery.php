<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'name',
        'summary',
        'user_id',
        'cover_image',
    ];


    public function images()
    {
        return $this->hasMany(GalleryImage::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
