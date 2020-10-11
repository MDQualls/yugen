<?php
namespace App\Repositories\Timeline;

use App\TimelineType;

class TimelineDataTypeRepository implements TimelineDataTypeRepositoryInterface
{
    public function getAll()
    {
        return TimelineType::all();
    }
}
