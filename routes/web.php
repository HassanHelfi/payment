<?php

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // Role::query()->create([
    //     'name' => 'member'
    // ]);

    // User::factory(2)->create();

    // UserRole::query()->create([
    //     'user_id' => 1,
    //     'role_id' => 1
    // ]);

    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['admin'])->group(function () {
    Route::resource('/users', App\Http\Controllers\Admin\UserController::class)->except([
        'show', 'create'
    ]);
});
