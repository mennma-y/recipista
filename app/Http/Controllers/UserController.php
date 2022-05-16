<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Follow;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    //
    public function index(Request $request , Follow $follow)
    {   
        $id = $request->id;
        if(!isset($id)){
            $id =\Auth::user()->id;  
        }
        $user=User::where('id',$id)->first();   
        $follow_count = $follow->getFollowCount($user->id);  

        $follower_count = $follow->getFollowerCount($user->id);  
        return view('user.profile',[
            'user'=>$user,
            'follow_count'=>$follow_count,
            'follower_count'=>$follower_count,
        ]);
    }

    public function update(Request $request)
    {
        
        $data =$request->all();

        $id =\Auth::user()->id;  

        
        

        if(isset($data['image'])){
            $fileName = $request->file('image')->getClientOriginalName();
            Storage::putFileAs('public/images',$request->file('image'),$fileName);       //リクエストされたファイルを$fileNameという名でpublic/imagesに保存する
            $fullFilePath = '/storage/images/'.$fileName; 
        }else{
            $fullFilePath = '/storage/images/defaultImage.png';
        }  

        if(isset($data['password'])){
            User::where('id',$id)->update([  
                'name'=>$data['nickname'],
                'email'=>$data['email'], 
                'password'=>Hash::make($data['password']),
                'img_url'=>$fullFilePath,
                
    
            ]);
        }else{
            User::where('id',$id)->update([
                'name'=>$data['nickname'],
                'email'=>$data['email'], 
                'img_url'=>$fullFilePath,
                
    
            ]);
        }

        return redirect()->route('user.index',['id'=>$id]);  


    }
}
