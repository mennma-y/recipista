@extends('layouts.app')

@section('content')
    @include('parts.header')
    <div class="container">
        <h1 style="text-align: center;margin-top:40px; font-weight:bold;">レシピ詳細</h1>
        <div class="recipi-detail" style="margin-top:30px; position:relative">
            <h2 style="padding: 15px 10px 10px 40px;border: solid 1px #eef;background-color: silver;
                    border-radius: 20px;width:80%;margin:auto;">料理名     : {{$recipi->recipi_name}} 　<span style="font-size: 18px;">(投稿者：<a href="{{route('user.index',['id'=>$recipi->user->id])}}">{{$recipi->user->name}}さん</a>)</span></h2> 
            <div class="recipi-detail-image" style="width:60%;margin:auto;margin-top:40px;">
                <img src="{{$recipi->img_url}}" alt="" style="width:100%;">
            </div>
            <div class="recipi-detail" style="width: 80%; margin:auto;margin-top:40px;">
                <p style="font-size: 20px;padding: 20px;border: solid 1px #eef;background-color: wheat;
                    border-radius: 20px;margin-bottom:30px;">{{$recipi->body}}</p>
            </div>
            
        </div>
    </div>
    @include('parts.footer')
@endsection