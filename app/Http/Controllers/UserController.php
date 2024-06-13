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

    public function updateProfile(UserRequest $request){
        $user = User::find($request->user_id);
        $user->update([
            'email'=>$request->email,
            'phone'=>$request->phone,
            'notification_switch'=>($request->notification_switch)?'1':'0'
        ]);
        return redirect()->back()->with('message','Profile updated successfully.');
    }

    public function home($id){
        $user = User::find($id);
        if(!$user){
            abort(404);
        }
        $userNotifictions = $user->unreadNotifications()->where('data->expiry_date', '>=',date('Y-m-d H:i'));
        $unreadNotifications = $userNotifictions->count();
        $notifications = $userNotifictions->get();
        return view('frontend.home', compact('user','unreadNotifications','notifications'));
    }

}
