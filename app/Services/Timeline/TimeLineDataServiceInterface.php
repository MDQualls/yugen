<?php

namespace App\Services\Timeline;

use App\Http\Requests\Timeline\CreateTimelineRequest;
use App\Http\Requests\Timeline\UpdateTimelineRequest;
use App\Timeline;

interface TimeLineDataServiceInterface
{
    public function addData(Timeline $timeline, CreateTimelineRequest $request);

    public function updateData(Timeline $timeline, UpdateTimelineRequest $request);
}
