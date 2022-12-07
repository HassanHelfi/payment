<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $accounts = Account::query()
        ->where('type', 2)
        ->whereHas('user')
        ->with('user')
        ->get()
        ->pluck('user.name', 'account_number');

        return view('admin.home.home', compact('accounts'));
    }
}
