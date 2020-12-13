<?php

namespace App\Http\Controllers;

use App\Services\Video\VideoServiceInterface;

class VideoController extends Controller
{
    /**
     * @var VideoServiceInterface
     */
    protected $videoService;

    public function __construct(VideoServiceInterface $videoService)
    {
        parent::__construct();

        $this->videoService = $videoService;
    }

    public function index()
    {
        $videos = $this->videoService->getVideoList();

        return view('video.index')
            ->with('videos', $videos);
    }
}
