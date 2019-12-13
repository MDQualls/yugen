<?php
namespace App\Services\File;

interface FileStorageInterface
{
    public function put($fileName, $file);

    public function delete($fileName);

    public function get($fileName);

    public function exists($fileName);

    public function download($fileName);
}
