<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()->with('roles')->get();
        return view('admin.users.index', compact('users'));
    }

    public function edit($user)
    {
        $user = User::query()->findOrFail($user);
        $roles = Role::query()->pluck('name', 'id');
        return view('admin.users.edit', compact('user', 'roles'));
    }

    //validations
    public function update(User $user, UserUpdateRequest $userUpdateRequest)
    {
        $user->update([
            'name' => $userUpdateRequest->name,
            'email' => $userUpdateRequest->email
        ]);
        $user->roles()->sync($userUpdateRequest->roles);
        return redirect(route('users.index'));
    }

}
