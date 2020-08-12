<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Timeline\CreateTimelineRequest;
use App\Repositories\Timeline\TimelineRepositoryInterface;
use App\Timeline;
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
        return view('admin.timeline.create');
    }

    public function store(CreateTimelineRequest $timeline)
    {
        //all timelines go to Holly
        $user = User::where('email','=','hollyqualls@gmail.com')->first();

        Timeline::create([
            'timeline_entry' => $timeline->timeline_entry,
            'user_id' => $user->id,
        ]);

        session()->flash('success', 'Timeline Entry successfully created');

        return redirect(route('admin-timelines'));
    }

    public function edit()
    {
        return view('admin.timeline.create');
    }

    public function update()
    {
        return redirect(route('admin-timelines'));
    }

    public function destroy()
    {
        return redirect(route('admin-timelines'));
    }
}
