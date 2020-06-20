<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'name',
        'summary',
        'user_id',
    ];


    public function images()
    {
        return $this->hasMany(GalleryImage::class);
    }
}
