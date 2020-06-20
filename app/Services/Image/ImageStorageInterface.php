<?php
namespace App\Services\Image;

interface ImageStorageInterface
{
    public function store($fileName, $file);

    public function delete($fileName);
}
