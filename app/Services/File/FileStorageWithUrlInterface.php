<?php
namespace App\Services\File;

interface FileStorageWithUrlInterface extends FileStorageInterface
{
    public function url($fileName);
}
