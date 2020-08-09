<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimelineType extends Model
{
    protected $fillable = [
        'timeline_type'
    ];

    public function timelineData()
    {
        return $this->hasMany(TimelineData::class);
    }
}
