<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Right extends Model
{
    protected $fillable = [
        'right_name',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
