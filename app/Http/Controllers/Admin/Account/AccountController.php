<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Account\StoreAccountRequest;
use App\Models\Account;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    public function create()
    {
        $users = User::query()->pluck('name', 'id');
        return view('admin.account.create', compact('users'));
    }

    public function store(StoreAccountRequest $storeAccountRequest)
    {
        $user = User::query()->findOrFail($storeAccountRequest->user_id);
        Account::query()->create([
            'user_id' => $user->id,
            'account_number' => md5(microtime()),
            'type' => $storeAccountRequest->type,
        ]);

        Session::flash('success', ' با موفقیت ایجاد شد');
        return redirect(route('home'));
    }
}
