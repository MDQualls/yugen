<?php

namespace App\Services\Image;

use Intervention\Image\Image;
use Intervention\Image\ImageManager;


class InterventionService implements ImageResizeInterface
{
    /**
     * @var ImageManager
     */
    protected $interventionImage;

    public function __construct(ImageManager $interventionImage)
    {
        $this->interventionImage = $interventionImage;
    }

    /**
     * @param $image
     * @param null $width
     * @param null $height
     * @return Image|mixed
     */
    public function resize($image, $width = null, $height = null)
    {
        if($width == null && $height == null)  {
            return $image;
        }

        $img = $this->interventionImage->make($image);

        // prevent possible upsizing
        $img->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($image);

        return $img;
    }
}
