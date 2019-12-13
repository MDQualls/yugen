<?php
namespace App\Services\Image;

interface ImageResizeInterface
{
    /**
     * @param $image
     * @param $width
     * @param $height
     * @return mixed
     */
    public function resize ($image, $width, $height);
}
