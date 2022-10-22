<?php

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
    return view('welcome');
});

Route::get('/admin/dashboard', action:\App\Http\Controllers\Admin\DashboardController::class)->name('admin.dashboard');
//ROUTES FOR AUTH
Route::get('/login', \App\Http\Livewire\Login::class)->name('login');
Route::get('/logout', \App\Http\Livewire\Logout::class)->name('logout');

//ROUTE FOR ROLES
Route::get('/roles/store', \App\Http\Livewire\Roles\Store::class)->name('roles.store');
Route::get('/roles/index', \App\Http\Livewire\Roles\Index::class)->name('roles.index');
Route::get('/roles/show', \App\Http\Livewire\Roles\Show::class)->name('roles.show');
Route::get('/roles/update', \App\Http\Livewire\Roles\Update::class)->name('roles.update');
Route::get('/roles/destroy', \App\Http\Livewire\Roles\Destroy::class)->name('roles.destroy');

//ROUTE FOR USERS
Route::get('/users/store', \App\Http\Livewire\Users\Store::class)->name('users.store');
Route::get('/users/index', \App\Http\Livewire\Users\Index::class)->name('users.index');
Route::get('/users/show', \App\Http\Livewire\Users\Show::class)->name('users.show');
Route::get('/users/update', \App\Http\Livewire\Users\Update::class)->name('users.update');
Route::get('/users/destroy', \App\Http\Livewire\Users\Destroy::class)->name('users.destroy');
