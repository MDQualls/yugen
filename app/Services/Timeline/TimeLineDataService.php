<?php

namespace App\Services\Timeline;

use App\Http\Requests\Timeline\CreateTimelineRequest;
use App\Timeline;

class TimeLineDataService implements TimeLineDataServiceInterface
{
    public function updateData(Timeline $timeline,CreateTimelineRequest $request)
    {
        $x = $request;
        return $x;
    }
}
