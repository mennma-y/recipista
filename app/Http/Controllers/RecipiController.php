<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Recipi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RecipiController extends Controller
{
    //
    public function index()
    {   
        $user=Auth::user();
        $recipis=Recipi::orderBy('created_at','desc')->paginate(12);
        return view('recipi.main',[
            'recipis'=>$recipis,
            'user'=>$user,
        ]);
    }

    public function create()  
    {
        $user =Auth::user();
        return view('recipi.create',[
            'user'=>$user,
        ]);
    }

    public function store(Request $request)
    {
        //ファイルの処理
        $fileName = $request->file('img_url')->getClientOriginalName();
        Storage::putFileAs('public/image',$request->file('img_url'),$fileName);       //リクエストされたファイルを$fileNameという名でpublic/imagesに保存する
        $fullFilePath = '/storage/image/'.$fileName;
        
        $user = Auth::user();
        //DB
        $recipi =new Recipi();
        $recipi->recipi_name = $request->recipi_name;
        $recipi->category = $request->category;
        $recipi->body = $request->body;
        $recipi->img_url = $fullFilePath;
        $recipi->user_id = $user->id;  
        

        $recipi->save();

        return redirect()->route('recipi.main');
    }

    public function show($id)
    {   
        $user=Auth::user();
        
        $recipi=Recipi::find($id);

        return view('recipi.show',[
            'recipi'=>$recipi,
            'user'=>$user,
            
        ]);   
    }

    public function edit($id)  
    {   
        $user=Auth::user();
        
        $recipi=Recipi::find($id);

        return view('recipi.edit',[
            'recipi'=>$recipi,
            'user'=>$user,
        ]);
    }

    public function update(Request $request, $id)
    {   
        //ファイルの処理
        $fileName = $request->file('img_url')->getClientOriginalName();
        Storage::putFileAs('public/image',$request->file('img_url'),$fileName);       //リクエストされたファイルを$fileNameという名でpublic/imagesに保存する
        $fullFilePath = '/storage/image/'.$fileName;

        $user = Auth::user();
        $recipi=Recipi::find($id);


        $recipi->recipi_name = $request->recipi_name;
        $recipi->category = $request->category;
        $recipi->body = $request->body;
        $recipi->img_url = $fullFilePath;
        $recipi->user_id = $user->id;

        $recipi->save();

        return redirect()->route('recipi.main',['id'=>$recipi->id]);
    }

    public function delete($id, Recipi $recipi)
    {
        $recipi=Recipi::find($id);
        $recipi->delete();

        return redirect()->route('recipi.main',['id'=>$recipi->id]);

    }

    public function other($id)  
    {
        $user = Auth::user();
        
        $recipis=Recipi::orderBy('created_at','desc')->where('user_id',$id)->paginate(12);
        return view('recipi.other',[
            'user'=>$user,
            'recipis'=>$recipis,
        ]);
        

    }
}
