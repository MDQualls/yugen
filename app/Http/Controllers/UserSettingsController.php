<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserSettingsController extends Controller
{
    public function index(User $user)
    {
        return view('user.usersettings')->with('user', $user)->with('title', 'User Settings');
    }
}
