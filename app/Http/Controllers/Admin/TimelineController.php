<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Timeline\CreateTimelineRequest;
use App\Http\Requests\Timeline\UpdateTimelineRequest;
use App\Repositories\Timeline\TimelineDataTypeRepositoryInterface;
use App\Repositories\Timeline\TimelineRepositoryInterface;
use App\Services\Timeline\TimeLineDataServiceInterface;
use App\Timeline;
use App\TimelineData;
use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class TimelineController extends Controller
{
    /**
     * @var TimelineRepositoryInterface
     */
    protected $timelineRepository;

    /**
     * @var TimelineDataTypeRepositoryInterface
     */
    protected $timelineDataTypeRepository;

    /**
     * @var TimeLineDataServiceInterface
     */
    protected $timelineDataService;

    public function __construct(
        TimelineRepositoryInterface $timelineRepository,
        TimelineDataTypeRepositoryInterface $timelineDataTypeRepository,
        TimeLineDataServiceInterface $timelineDataService
    )
    {
        parent::__construct();
        $this->timelineRepository = $timelineRepository;
        $this->timelineDataTypeRepository = $timelineDataTypeRepository;
        $this->timelineDataService = $timelineDataService;
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

    public function show(Timeline $timeline)
    {
        return view('admin.timeline.show')->with('timeline', $timeline);
    }

    public function create()
    {
        $timelineDataTypes = $this->timelineDataTypeRepository->getAll();

        return view('admin.timeline.create')->with('timelineDataTypes', $timelineDataTypes);
    }

    public function store(CreateTimelineRequest $timeline)
    {
        //all timelines go to Holly
        $user = User::where('email', '=', 'hollyqualls@gmail.com')->first();

        $newEntry = Timeline::create([
            'timeline_entry' => $timeline->timeline_entry,
            'user_id' => $user->id,
        ]);

        $this->timelineDataService->updateData($newEntry, $timeline);

        session()->flash('success', 'Timeline Entry successfully created');

        return redirect(route('admin-timelines'));
    }

    public function edit(Timeline $timeline)
    {
        return view('admin.timeline.create')
            ->with('timelineEntry', $timeline);
    }

    public function update(UpdateTimelineRequest $request, Timeline $timeline)
    {
        $timeline->update([
            'timeline_entry' => $request->timeline_entry
        ]);

        session()->flash('success', 'Diary Timeline updated successfully.');

        return redirect(route('admin-timelines'));
    }

    public function destroy()
    {
        return redirect(route('admin-timelines'));
    }
}
