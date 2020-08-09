<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Timeline\TimelineRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class TimelineController extends Controller
{
    /**
     * @var TimelineRepositoryInterface
     */
    protected $timelineRepository;

    public function __construct(TimelineRepositoryInterface $timelineRepository)
    {
        parent::__construct();
        $this->timelineRepository = $timelineRepository;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $timelines = $this->timelineRepository->getAllTimelinesPaginated();

        return view('admin.timeline.index')
            ->with('timelines', $timelines);
    }

    public function show()
    {

    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
