<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimelineData extends Model
{
    protected $fillable = [
        'timeline_id',
        'timeline_type_id',
        'data_entry',
    ];

    public function timeline()
    {
        return $this->belongsTo(Timeline::class);
    }

    public function timelineType()
    {
        return $this->belongsTo(TimelineType::class);
    }
}
