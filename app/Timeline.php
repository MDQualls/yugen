<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'timeline_entry',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function timelineData()
    {
        return $this->hasMany(TimelineData::class);
    }
}
