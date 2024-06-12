<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\UserNotification;
use App\Http\Requests\NotificationRequest;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function index(){
        $users = User::get();        
        return view('notifications.index', compact('users'));
    }

    public function store(NotificationRequest $request){
        // dd($request->all());
        $users = User::whereNotNull('id');
        if(in_array(0,$request->user_id)){
            $users = $users->get();
        }
        else{
            $users = $users->whereIn('id',$request->user_id)->get();
        }
        foreach($users as $user){
            $user->notify(new UserNotification($request->message,$request->type,$request->expiry_date,$user->id));
        }
        return redirect()->route('notifications.index');
    }

    public function create(){
        $users = User::get();
        return view('notifications.create', compact('users'));
    }

    public function readNotification($id){
        $notification = DatabaseNotification::find($id);
        if($notification){
            $notification->markAsRead();
            return ['success'=>1];
        }
        return ['success'=>0];
    }
}
