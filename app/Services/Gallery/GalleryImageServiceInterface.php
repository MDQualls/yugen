<?php

namespace App\Services\Gallery;

interface GalleryImageServiceInterface
{
    public function getImages($galleryId);

    public function getImage($imageId);

    public function getAlbumCoverImages();

    public function updateImages(array $data);

    public function deleteImage($imageId);
}
