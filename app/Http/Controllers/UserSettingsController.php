<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UpdatePasswordRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Services\User\UpdatePasswordInterface;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserSettingsController extends Controller
{
    /**
     * @var UpdatePasswordInterface
     */
    private $updatePasswordService;

    public function __construct(UpdatePasswordInterface $updatePasswordService)
    {
        $this->middleware('userisuser');

        parent::__construct();
        $this->updatePasswordService = $updatePasswordService;
    }

    /**
     * @param User $user
     * @return Factory|View
     */
    public function index(User $user)
    {
        return view('user.usersettings')
            ->with('user', $user)
            ->with('title', 'User Settings');
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = [];
        $data['name'] = ($request->name != '') ? $request->name : $user->name;
        $data['email'] = ($request->email != '') ? $request->email : $user->email;
        $data['about'] = ($request->about != '') ? $request->about : $user->about;
        $data['content_alert'] = ($request->content_alert != '') ? 1 : 0;
        $data['response_alert'] = ($request->response_alert != '') ? 1 : 0;
        $data['offering_alert'] = ($request->offering_alert != '') ? 1 : 0;

        $user->update($data);

        session()->flash('success', 'Your user settings were updated successfully.');

        return redirect(route('/'));
    }

    /**
     * @param User $user
     * @return Factory|View
     */
    public function editPassword(User $user)
    {
        return view('user.password')
            ->with('user', $user)
            ->with('title', 'Update Password');
    }

    /**
     * @param UpdatePasswordRequest $request
     * @param User $user
     * @return Factory|RedirectResponse|View
     */
    public function updatePassword(UpdatePasswordRequest $request, User $user)
    {
        if ($this->updatePasswordService->attemptToUpdatePassword($user->email, $request->currentPassword, $request->newPassword)) {
            session()->flash('success', 'Your password as been successfully updated');
            return redirect()->route('/');
        }

        session()->flash('error', 'Password update failed.  Please review your entries and try again');
        return view('user.password')
            ->with('user', $user)
            ->with('title', 'Update Password');
    }
}
