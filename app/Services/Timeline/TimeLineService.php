<?php

namespace App\Services\Timeline;

use App\Repositories\Timeline\TimelineRepositoryInterface;
use Carbon;

class TimeLineService implements TimeLineServiceInterface
{
    /**
     * @var TimelineRepositoryInterface
     */
    protected TimelineRepositoryInterface $timelineRepository;

    public function __construct(TimelineRepositoryInterface $timelineRepository)
    {
        $this->timelineRepository = $timelineRepository;
    }

    /**
     * @return array
     */
    public function getTimelineGroupedByYear(): array
    {
        $timeline = $this->timelineRepository->getAllTimelines();

        $result = [];

        foreach ($timeline as $entry) {
            $year = Carbon\Carbon::parse($entry->created_at)->format('Y');

            $result[$year][] = [
                'timeline_entry' => $entry->timeline_entry,
                'userName' => $entry->user->name,
                'timelineData' => $entry->timelineData,
                'created_at' => $entry->created_at->toDateTimeString(),
            ];
        }

        return $result;
    }
}
