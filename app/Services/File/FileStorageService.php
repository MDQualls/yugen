<?php
namespace App\Services\File;

use Illuminate\Support\Facades\Storage;

class FileStorageService implements FileStorageInterface
{
    /**
     * @var Storage
     */
    protected $storage;

    public function __construct(Storage $storage)
    {
        $this->storage = $storage;
    }

    public function put($fileName, $file)
    {
        $this->storage::put($fileName, $file);
    }

    public function delete($fileName)
    {
        $this->storage::delete($fileName);
    }

    /**
     * @param $fileName
     * @return string
     */
    public function get($fileName)
    {
        return $this->storage::get($fileName);
    }

    public function exists($fileName)
    {
        return $this->storage::exists($fileName);
    }

    public function download($fileName)
    {
        return $this->storage::download($fileName);
    }
}
