<?php

namespace App\Services\Video\Factory;

use App\Services\Video\Adapter\TikTokAdapter;
use App\Services\Video\Adapter\VideoAdapterInterface;
use App\Services\Video\VideoService;
use App\Services\Video\VideoServiceInterface;

class VideoServiceFactory
{
    protected $adapters = [
        TikTokAdapter::class,
    ];

    /**
     * @param VideoAdapterInterface $adapter
     * @return VideoService|null
     */
    public function getInstance(VideoAdapterInterface $adapter): ?VideoServiceInterface
    {
        if(!in_array($adapter, $this->adapters))  {
            return null;
        }

        return new VideoService($adapter);
    }
}
