<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Follow;


class FollowController extends Controller  
{
    //
    public function follow(Request $request,Follow $follow)
    {
        $follow_user_id =Auth::id();
        $followed_user_id =$request->followed_user_id;
        $follow_id = null;
        
        //followed_user_idがpostされた場合(フォローする)
        if(isset($followed_user_id)){
            $follow =new Follow;
            $follow->follow_user_id = $follow_user_id;
            $follow->followed_user_id = $followed_user_id;
            $follow->save();
            $follow_id = $follow->id;

            
        }

        //follow_idがpostされた場合(フォローを外す)
        if(isset($request->$follow_id)){
            $follow =Follow::find($request->follow_id);
            $follow->save();

            $followed_user_id = $follow->followed_user_id;
            $follow_user_id = $follow->follow_user_id;

            
        }

        $param =[
            'message'=>'success',
            'follow_id'=>$follow_id,
        ];

        return response()->json($param); //JSONデータをjqueryに返す
    }
}
   