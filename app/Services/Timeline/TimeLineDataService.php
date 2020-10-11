<?php

namespace App\Services\Timeline;

use App\Http\Requests\Timeline\CreateTimelineRequest;
use App\Http\Requests\Timeline\UpdateTimelineRequest;
use App\Timeline;
use App\TimelineData;

class TimeLineDataService implements TimeLineDataServiceInterface
{
    public function addData(Timeline $timeline,CreateTimelineRequest $request)
    {
        foreach ($request->request as $key => $item)  {
            if(strpos($key,'timeline_datatype') === 0)  {

                $position = substr($key, -1);

                if(empty($request->{"timeline_datapoint_$position"}))  {
                    continue;
                }

                $dataEntry = new TimelineData([
                    'timeline_id' => $timeline->id,
                    'timeline_type_id' => $request->{"timeline_datatype_$position"},
                    'data_entry' => $request->{"timeline_datapoint_$position"},
                ]);

                $dataEntry->save();
            }
        }
    }

    public function updateData(Timeline $timeline,UpdateTimelineRequest $request)
    {
        $data = [];

        $timeline->timelineData()->delete();

        foreach ($request->request as $key => $item)  {
            if(strpos($key,'timeline_datatype') === 0)  {

                $position = substr($key, -1);

                if(trim($request->{"timeline_datapoint_$position"}) === "")  {
                    continue;
                }

                $dataEntry = new TimelineData([
                    'timeline_id' => $timeline->id,
                    'timeline_type_id' => $request->{"timeline_datatype_$position"},
                    'data_entry' => $request->{"timeline_datapoint_$position"},
                ]);

                $data[] = $dataEntry;
            }
        }

        $timeline->timelineData()->saveMany($data);
    }
}
