<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Recipi;
use App\User;
use Auth;

use App\Notification;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response  
     */
    public function index(Recipi $recipi)
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Recipi $recipi)
    {
        //
        $recipi->users()->attach(Auth::id());  

        $notification = new Notification();

        $notification->sent_user_id = Auth::id();
        $notification->received_user_id = $recipi->user->id;
        $notification->message = 'いいねされました！！';
        $notification->save();  
        

        return redirect()->route('recipi.main');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipi $recipi)
    {
        //
        $recipi->users()->detach(Auth::id());

        return redirect()->route('recipi.main');
        


    }
}
