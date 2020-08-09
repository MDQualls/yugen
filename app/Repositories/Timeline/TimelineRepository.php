<?php
namespace App\Repositories\Timeline;

use App\Timeline;
use App\User;

class TimelineRepository implements TimelineRepositoryInterface
{
    /**
     * @var Timeline
     */
    protected $timeline;

    public function __construct(Timeline $timeline)
    {
        $this->timeline = $timeline;
    }

    /**
     * @param int $pageSize
     * @return array
     */
    public function getAllTimelinesPaginated($pageSize = 6)
    {
        return $this->timeline::paginate($pageSize)
            ->sortBy('created_at', SORT_REGULAR, true);
    }

    /**
     * @param User $user
     * @param int $pageSize
     * @return array
     */
    public function getUserTimelinePaginated(User $user, $pageSize = 6) : array
    {
        return $this->timeline::where('user_id','=', $user->id)
            ->sortBy('created_at', SORT_REGULAR, true)
            ->simplePaginate($pageSize);
    }
}
