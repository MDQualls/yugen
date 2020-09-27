<?php

namespace App\Services\Timeline;

use App\Http\Requests\Timeline\CreateTimelineRequest;
use App\Timeline;

interface TimeLineDataServiceInterface
{
    public function updateData(Timeline $timeline, CreateTimelineRequest $request);
}
