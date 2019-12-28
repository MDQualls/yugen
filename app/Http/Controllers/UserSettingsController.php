<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UpdatePasswordRequest;
use App\Services\User\UpdatePasswordInterface;
use App\User;

class UserSettingsController extends Controller
{
    /**
     * @var UpdatePasswordInterface
     */
    private $updatePasswordService;

    public function __construct(UpdatePasswordInterface $updatePasswordService)
    {
        $this->updatePasswordService = $updatePasswordService;
    }

    public function index(User $user)
    {
        return view('user.usersettings')->with('user', $user)->with('title', 'User Settings');
    }

    public function editPassword(User $user)
    {
        return view('user.password')->with('user', $user)->with('title', 'Update Password');
    }

    public function updatePassword(UpdatePasswordRequest $request, User $user)
    {
        if ($this->updatePasswordService->attemptToUpdatePassword($user->email, $request->currentPassword, $request->newPassword)) {
            session()->flash('success', 'Your password as been successfully updated');
            return redirect()->route('home');
        }

        session()->flash('error', 'Password update failed.  Please review your entries and try again');
        return view('user.password')->with('user', $user)->with('title', 'Update Password');
    }
}
