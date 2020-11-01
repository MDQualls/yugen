<?php

namespace App\Http\Controllers;

use App\Repositories\Timeline\TimelineRepositoryInterface;

class TimelineController extends Controller
{
    /**
     * @var TimelineRepositoryInterface
     */
    protected $timelineRepository;

    public function __construct(
        TimelineRepositoryInterface $timelineRepository
    )
    {
        parent::__construct();
        $this->timelineRepository = $timelineRepository;
    }

    public function index()
    {
        $timeline = $this->timelineRepository->getAllTimelines();
        return view('timeline.index')->with('timeline',$timeline);
    }
}
