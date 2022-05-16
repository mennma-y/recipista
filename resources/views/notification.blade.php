@extends('layouts.app')

@section('content')
    @include('parts.header')
    <div class="container-back">
        <h1 style="text-align: center;color:aliceblue;font-weight:bold;font-size:40px; margin-top:50px;">たくさんの通知が来ています！</h1>
        <h3 style="text-align:center;margin-top:30px;color:aliceblue">~ 確認してフォローも返してあげよう！~</h3>
        <ul class="list-group" style="width: 70%;margin: auto;margin-top: 50px;margin-bottom: 40px;">
            <li class="list-group-item disabled" aria-disabled="true" style="text-align:center;font-size:30px;
                font-weight:bold;background-color:chocolate;color:azure">通知リスト</li>
            @foreach($notifications as $notification)
                <li class="list-group-item" style="font-size: 20px;padding-left: 60px;"><a href="{{route('user.index',['id'=>$notification->sent_user->id])}}">{{$notification->sent_user->name}}</a>さんから{{$notification->message}}</li>
            @endforeach
        </ul>
        <div class="event-pagination" style="width: 20%; margin:30px auto;">
                    {{$notifications->links()}}
        </div>
    </div>
    @include('parts.footer')  
    
@endsection