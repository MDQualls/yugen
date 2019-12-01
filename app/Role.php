<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'role_name',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function rights()
    {
        return $this->belongsToMany(Right::class);
    }

    public function hasRight($rightId)
    {
        return in_array($rightId, $this->rights->pluck('id')->toArray());
    }
}
