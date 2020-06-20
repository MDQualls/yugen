<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    protected $fillable = [
        'image',
        'cover_image',
        'gallery_id',
        'alt_text',
    ];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
