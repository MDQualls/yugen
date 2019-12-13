<?php
namespace App\Services\File;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Storage;

class S3FileService implements FileStorageWithUrlInterface
{
    /**
     * @var Storage
     */
    protected $s3;

    const S3IMAGEDIR = '/images/';

    const ACCESSOPTION = 'public';

    public function __construct(Storage $s3)
    {
        $this->s3 = $s3;
    }

    /**
     * @param $fileName
     * @param $file
     * @return bool
     */
    public function put($fileName, $file)
    {
        return $this->s3::disk('s3')->put(self::S3IMAGEDIR . $fileName, $file, self::ACCESSOPTION);
    }

    /**
     * @param $fileName
     * @return bool
     */
    public function delete($fileName)
    {
        return $this->s3::disk('s3')->delete($fileName);
    }

    /**
     * @param $fileName
     * @return string
     * @throws FileNotFoundException
     */
    public function get($fileName)
    {
        $contents = $this->s3::disk('s3')->get(self::S3IMAGEDIR . $fileName);
        return $contents;
    }

    /**
     * @param $fileName
     * @return bool
     */
    public function exists($fileName)
    {
        $exists = $this->s3::disk('s3')->exists(self::S3IMAGEDIR . $fileName);
        return $exists;
    }

    /**
     * @param $fileName
     * @return mixed
     */
    public function download($fileName)
    {
        return $this->s3::disk('s3')->download(self::S3IMAGEDIR . $fileName);
    }

    public function url($fileName)
    {
        $url = $this->s3::disk('s3')->url(self::S3IMAGEDIR . $fileName);
        return $url;
    }
}
