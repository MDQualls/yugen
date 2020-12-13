<?php

namespace App\Services\Video;

use App\Services\Video\Adapter\VideoAdapterInterface;

class VideoService implements VideoServiceInterface
{
    /**
     * @var VideoAdapterInterface
     */
    protected $adapter;

    public function __construct(VideoAdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    public function getVideoList() : array
    {
        return $this->adapter->getVideos();
    }
}
