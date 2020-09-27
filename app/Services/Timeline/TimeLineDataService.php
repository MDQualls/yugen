<?php

namespace App\Services\Timeline;

use App\Http\Requests\Timeline\CreateTimelineRequest;
use App\Timeline;
use App\TimelineData;

class TimeLineDataService implements TimeLineDataServiceInterface
{
    public function updateData(Timeline $timeline,CreateTimelineRequest $request)
    {
        foreach ($request->request as $key => $item)  {
            if(strpos($key,'timeline_datatype') === 0)  {

                $position = substr($key, -1);
                $dataEntry = new TimelineData([
                    'timeline_id' => $timeline->id,
                    'timeline_type_id' => $request->{"timeline_datatype_$position"},
                    'data_entry' => $request->{"timeline_datapoint_$position"},
                ]);

                $dataEntry->save();
            }
        }
    }
}
