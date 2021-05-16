<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Role;
use App\User;
use App\UserStatus;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        return view('admin.user.index')->with('users', User::all());
    }

    /**
     * @return RedirectResponse|Redirector
     */
    public function create()
    {
        return redirect(route('users.index'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        return redirect(route('users.index'));
    }

    /**
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function show($id)
    {
        return redirect(route('users.index'));
    }

    /**
     * @param User $user
     * @return Factory|View
     */
    public function edit(User $user)
    {
        return view('admin.user.create')
            ->with('user', $user)
            ->with('statuses', UserStatus::all())
            ->with('roles', Role::all());
    }

    /**
     * @param UpdateUserRequest $request
     * @param User $user
     * @return RedirectResponse|Redirector
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = [];
        $data['name'] = ($request->name != '') ? $request->name : $user->name;
        $data['email'] = ($request->email != '') ? $request->email : $user->email;
        $data['role_id'] = ($request->role != '') ? $request->role : $user->role->id;
        $data['status_id'] = ($request->status != '') ? $request->status : $user->status->id;
        $data['admin_note'] = ($request->admin_note != '') ? $request->admin_note : $user->admin_note;

        $user->update($data);

        session()->flash('success', 'User updated successfully.');

        return redirect(route('user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        return redirect(route('users.index'));
    }
}
