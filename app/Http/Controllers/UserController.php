<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('users.index', compact('users'));
    }

    public function profile($id){
        $user = User::find($id);
        $userNotifictions = $user->unreadNotifications()->where('data->expiry_date', '>=',date('Y-m-d H:i'));
        $unreadNotifications = $userNotifictions->count();
        $notifications = $userNotifictions->get();
        return view('users.profile', compact('user','unreadNotifications','notifications'));
    }

    public function updateProfile(UserRequest $request){
        // dd($request->all());

        $user = User::find($request->user_id);
        $user->update([
            'email'=>$request->email,
            'phone'=>$request->phone,
            'notification_switch'=>($request->notification_switch)?'1':'0'
        ]);
        return redirect('users');
    }

}
