<?php

namespace App\Http\Controllers;

use App\Repositories\Timeline\TimelineRepositoryInterface;
use App\Services\Timeline\TimeLineServiceInterface;


class TimelineController extends Controller
{
    /**
     * @var TimeLineServiceInterface
     */
    protected TimeLineServiceInterface $timelineService;

    public function __construct(TimeLineServiceInterface $timelineService)
    {
        parent::__construct();
        $this->timelineService = $timelineService;
    }

    public function index()
    {
        $timeline = $this->timelineService->getTimelineGroupedByYear();

        return view('timeline.index')->with('timeline', $timeline);
    }
}
