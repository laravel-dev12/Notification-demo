<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotificationController;

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
    return redirect('users');
});

Route::get('/home/{id}', [UserController::class,'home'])->name('user.home');

Route::get('users', [UserController::class,'index'])->name('users.index');
Route::get('user/profile/{id}', [UserController::class,'profile'])->name('user.profile');
Route::post('user/profile', [UserController::class,'updateProfile'])->name('profile.update');
Route::get('notifications', [NotificationController::class,'index'])->name('notifications.index');
Route::get('notifications/create', [NotificationController::class,'create'])->name('notifications.create');
Route::post('notifications', [NotificationController::class,'store'])->name('notifications.store');
Route::get('read-notification/{id}', [NotificationController::class,'readNotification']);
