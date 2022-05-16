<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Notification;
use App\Follow;
use App\Recipi;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Support\Facades\Auth;


class NotificationController extends Controller  
{
    //
    public function index()
    {   
        $user=Auth::user();

        
        
        $notifications = Notification::where('received_user_id',$user->id)->paginate(10);     

        

        


        return view('notification',[
            'user'=>$user,
            'notifications'=>$notifications,
            
        ]);

    }

    

    
}
