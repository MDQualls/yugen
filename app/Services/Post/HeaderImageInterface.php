<?php
namespace App\Services\Post;

interface HeaderImageInterface
{
    public function store($fileName, $file);

    public function delete($fileName);
}
