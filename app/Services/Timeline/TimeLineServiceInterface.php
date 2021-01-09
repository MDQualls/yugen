<?php

namespace App\Services\Timeline;

interface TimeLineServiceInterface
{
    /**
     * @return array
     */
    public function getTimelineGroupedByYear(): array;
}
