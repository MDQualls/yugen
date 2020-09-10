<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Timeline\CreateTimelineDataTypeRequest;
use App\TimelineType;
use Illuminate\Http\Request;

class TimeLineDataTypeController extends Controller
{
    public function store(CreateTimelineDataTypeRequest $type)
    {
        $timelineType = $type->timeline_type;

        TimelineType::create([
            'timeline_type' => $timelineType,
        ]);

        return redirect(route('admin-timelines'));
    }
}
