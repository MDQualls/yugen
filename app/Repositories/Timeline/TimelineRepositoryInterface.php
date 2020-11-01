<?php
namespace App\Repositories\Timeline;

use App\User;

interface TimelineRepositoryInterface
{
    public function getAllTimelinesPaginated($pageSize = 6);
    public function getUserTimelinePaginated(User $user, $pageSize = 6) : array;
    public function getAllTimelines();
}
