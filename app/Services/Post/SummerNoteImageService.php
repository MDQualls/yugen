<?php

namespace App\Services\Post;

use App\Services\File\FileStorageWithUrlInterface;
use App\Services\Image\ImageResizeInterface;
use DOMDocument;
use DOMNodeList;

class SummerNoteImageService implements SummerNoteImageInterface
{
    /**
     * @var FileStorageWithUrlInterface
     */
    protected $s3;

    /**
     * @var ImageResizeInterface
     */
    protected $interventionService;

    public function __construct(
        FileStorageWithUrlInterface $s3,
        ImageResizeInterface $interventionService)
    {
        $this->s3 = $s3;
        $this->interventionService = $interventionService;
    }

    /**
     * @param string $submitted_text
     * @return string
     */
    public function storeImages($submitted_text)
    {
        // The text from Summernote here is saved in a variable called $submitted_text
        if (strpos($submitted_text, '<img') !== false && strpos($submitted_text, ';base64') !== false) {

            $doc = new DOMDocument();
            $doc->loadHTML($submitted_text);

            /** @var DOMNodeList $tags */
            $tags = $doc->getElementsByTagName('img');

            /** @var DOMNodeList::item $tag */
            foreach ($tags as $tag) {
                // Get base64 encoded string
                $srcStr = $tag->getAttribute('src');

                //if this is an existing image in s3, skip it
                if (strstr($srcStr, "yugenimagebucket")) {
                    continue;
                }

                $base64EncData = substr($srcStr, ($pos = strpos($srcStr, 'base64,')) !== false ? $pos + 7 : 0);
                $base64EncData = substr($base64EncData, 0, -1);

                // Get an image file
                $img = base64_decode($base64EncData);

                // Get file type
                $dataInfo = explode(";", $srcStr)[0];
                $fileExt = str_replace('data:image/', '', $dataInfo);

                // Create a new filename for the image
                $newImageName = str_replace(".", "", uniqid("post_img_", true));
                $filename = $newImageName . '.' . $fileExt;

                //resize the locally stored image - set width to 800 - matches blog width for our template
                //$localImage = storage_path('app/public/') . $filename;
                $resizedImage = $this->interventionService->resize(
                    $img,
                    800,
                    null);

                // Save the image to s3 disk
                $success = $this->s3->put($filename, $resizedImage->encode($fileExt));
                $imgUrl = $this->s3->url($filename);

                $tag->setAttribute('src', $imgUrl);
                $tag->setAttribute('data-original-filename', $tag->getAttribute('data-filename'));
                $tag->removeAttribute('data-filename');
                $submitted_text = $doc->saveHTML();
            }
        }

        return $submitted_text;
    }

    public function destroyImages($submitted_text)
    {
        $success = true;
        if (strpos($submitted_text, '<img') !== false) {

            $doc = new DOMDocument();
            $doc->loadHTML($submitted_text);

            /** @var DOMNodeList $tags */
            $tags = $doc->getElementsByTagName('img');

            /** @var DOMNodeList::item $tag */
            foreach ($tags as $tag) {
                // Get base64 encoded string
                $srcStr = $tag->getAttribute('src');
                $p = pathinfo($srcStr)['basename'];
                // Delete the image from s3 disk
                $success = $this->s3->delete($p);
            }
        }

        return $success;
    }
}
