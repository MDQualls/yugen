<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Timeline\CreateTimelineDataTypeRequest;
use App\TimelineType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TimelineDatatypeController extends Controller
{
    /**
     * @param CreateTimelineDataTypeRequest $type
     * @return RedirectResponse
     */
    public function store(CreateTimelineDataTypeRequest $type)
    {
        $timelineType = $type->timeline_type;

        TimelineType::create([
            'timeline_type' => $timelineType,
        ]);

        return redirect()->back();
    }
}
