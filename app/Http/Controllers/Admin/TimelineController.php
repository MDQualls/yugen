<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Timeline\CreateTimelineRequest;
use App\Http\Requests\Timeline\UpdateTimelineRequest;
use App\Repositories\Timeline\TimelineDataTypeRepositoryInterface;
use App\Repositories\Timeline\TimelineRepositoryInterface;
use App\Services\Log\LogServiceInterface;
use App\Services\Timeline\TimeLineDataServiceInterface;
use App\Timeline;
use App\TimelineData;
use App\User;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Log;
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

    /**
     * @var LogServiceInterface
     */
    protected $logService;

    public function __construct(
        TimelineRepositoryInterface $timelineRepository,
        TimelineDataTypeRepositoryInterface $timelineDataTypeRepository,
        TimeLineDataServiceInterface $timelineDataService,
        LogServiceInterface $logService
    )
    {
        parent::__construct();
        $this->timelineRepository = $timelineRepository;
        $this->timelineDataTypeRepository = $timelineDataTypeRepository;
        $this->timelineDataService = $timelineDataService;
        $this->logService = $logService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        try {
            $timelines = $this->timelineRepository->getAllTimelinesPaginated();
        } catch (Exception $e) {
            $this->logService->error($e->getMessage(), [
                debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 10),
            ]);
        }

        return view('admin.timeline.index')
            ->with('timelines', $timelines);
    }

    /**
     * @param Timeline $timeline
     * @return Application|Factory|View
     */
    public function show(Timeline $timeline)
    {
        return view('admin.timeline.show')->with('timeline', $timeline);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $timelineDataTypes = $this->timelineDataTypeRepository->getAll();

        return view('admin.timeline.create')->with('timelineDataTypes', $timelineDataTypes);
    }

    /**
     * @param CreateTimelineRequest $timeline
     * @return Application|RedirectResponse|Redirector
     */
    public function store(CreateTimelineRequest $timeline)
    {
        try {
            $user = auth()->user();

            $newEntry = Timeline::create([
                'timeline_entry' => $timeline->timeline_entry,
                'user_id' => $user->id,
            ]);

            $this->timelineDataService->addData($newEntry, $timeline);

            session()->flash('success', 'Timeline Entry successfully created');
        } catch (Exception $e) {
            $this->logService->error($e->getMessage(), [
                debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 10),
            ]);
        }
        return redirect(route('admin-timelines'));
    }

    /**
     * @param Timeline $timeline
     * @return Application|Factory|View
     */
    public function edit(Timeline $timeline)
    {
        $timelineDataTypes = $this->timelineDataTypeRepository->getAll();

        return view('admin.timeline.edit')
            ->with('timelineEntry', $timeline)
            ->with('timelineDataTypes', $timelineDataTypes);;
    }

    /**
     * @param UpdateTimelineRequest $request
     * @param Timeline $timeline
     * @return Application|RedirectResponse|Redirector
     */
    public function update(UpdateTimelineRequest $request, Timeline $timeline)
    {
        try {
            $timeline->update([
                'timeline_entry' => $request->timeline_entry
            ]);

            $this->timelineDataService->updateData($timeline, $request);

            session()->flash('success', 'Diary Timeline updated successfully.');

        } catch (Exception $e) {
            $this->logService->error($e->getMessage(), [
                debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 10),
            ]);
        }

        return redirect(route('admin-timelines'));
    }

    /**
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(Timeline $timeline)
    {
        try {
            $timeline->timelineData()->delete();
            $timeline->delete();

            session()->flash('success', 'Timeline entry deleted successfully');
        } catch (Exception $e) {
            $this->logService->error($e->getMessage(), [
                debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 10),
            ]);
        }
        return redirect(route('admin-timelines'));
    }
}
