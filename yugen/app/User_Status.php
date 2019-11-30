<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Status extends Model
{
    protected $fillable = [
        'status',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
