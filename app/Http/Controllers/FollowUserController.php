<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Follow;
use App\Notification;

class FollowUserController extends Controller
{
    //

    public function store($id, Follow $follow)
    {
        
        $user = \Auth::user();

        $user->follow($id);

        $notification = new Notification();
        $notification->sent_user_id = $user->id;
        $notification->received_user_id = $id;
        $notification->message = 'フォローされました！！';
        $notification->save();


        $follow_count = $follow->getFollowCount($user->id);    

        $follower_count = $follow->getFollowerCount($user->id);  

        return redirect()->route('user.index',[
            'id'=>$user->id,
            'follow_count'=>$follow_count,
            'follower_count'=>$follower_count,
            
        ]);

    }

    public function delete($id,Follow $follow)
    {
        
        $user = \Auth::user();

        $user->unfollow($id);

        $follow_count = $follow->getFollowCount($user->id);  

        $follower_count = $follow->getFollowerCount($user->id);  

        return redirect()->route('user.index',[
            'id'=>$user->id,
            'follow_count'=>$follow_count,
            'follower_count'=>$follower_count,   
        ]);
    }
    
    
    
}
