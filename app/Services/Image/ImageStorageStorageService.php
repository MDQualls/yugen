<?php
namespace App\Services\Image;

use App\Services\File\FileStorageWithUrlInterface;
use App\Services\Image\ImageResizeInterface;

class ImageStorageStorageService implements ImageStorageInterface
{
    /**
     * @var ImageResizeInterface
     */
    protected $interventionService;

    /**
     * @var FileStorageWithUrlInterface
     */
    protected $s3;

    public function __construct(ImageResizeInterface $interventionService, FileStorageWithUrlInterface $s3)
    {
        $this->interventionService = $interventionService;
        $this->s3 = $s3;
    }

    public function store($fileName, $file)
    {
        $fileExt = $file->getClientOriginalExtension();

        $resizedImage = $this->interventionService->resize(
            $file,
            800,
            null);

        $success = $this->s3->put($fileName, $resizedImage->encode($fileExt));
        $imgUrl = $this->s3->url($fileName);
        return $imgUrl;
    }

    public function delete($fileName)
    {
        $file = basename($fileName);
        $success = $this->s3->delete($file);
        return $success;
    }
}
