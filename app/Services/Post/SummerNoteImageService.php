<?php

namespace App\Services\Post;

use App\Services\File\FileStorageWithUrlInterface;
use DOMDocument;
use DOMNodeList;
use Illuminate\Routing\UrlGenerator;

class SummerNoteImageService implements SummerNoteImageInterface
{
    /**
     * @var FileStorageWithUrlInterface
     */
    protected $s3;

    public function __construct(UrlGenerator $url, FileStorageWithUrlInterface $s3)
    {
        $this->s3 = $s3;
    }

    /**
     * @param string $submitted_text
     * @return string
     */
    public function StoreImages($submitted_text)
    {
        // The text from Summernote here is saved in a variable called $submitted_text
        // This if-statement could probably be better, but this is working well for me so far
        if (strpos($submitted_text, '<img') !== false && strpos($submitted_text, ';base64') !== false) {

            $doc = new DOMDocument();
            $doc->loadHTML($submitted_text);

            /** @var DOMNodeList $tags */
            $tags = $doc->getElementsByTagName('img');

            /** @var DOMNodeList::item $tag */
            foreach ($tags as $tag) {
                // Get base64 encoded string
                $srcStr = $tag->getAttribute('src');
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

                // Save the image to disk
                $success = $this->s3->put($filename, $img);
                $imgUrl = $this->s3->url($filename);

                // Update the forum thread text with an img tag for the new image
                $newImgTag = '<img src="' . $imgUrl . '" />';

                $tag->setAttribute('src', $imgUrl);
                $tag->setAttribute('data-original-filename', $tag->getAttribute('data-filename'));
                $tag->removeAttribute('data-filename');
                $submitted_text = $doc->saveHTML();
            }
        }

        return $submitted_text;
    }
}
