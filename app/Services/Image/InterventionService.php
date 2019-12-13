<?php

namespace App\Services\Image;

use Intervention\Image\Image;


class InterventionService implements ImageResizeInterface
{
    /**
     * @var Image
     */
    protected $interventionImage;

    public function __construct(Image $interventionImage)
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
        });

        return $img;
    }
}
