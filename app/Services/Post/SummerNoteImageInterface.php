<?php
namespace App\Services\Post;

interface SummerNoteImageInterface
{
    public function storeImages($submitted_text);

    public function destroyImages($submitted_text);
}
